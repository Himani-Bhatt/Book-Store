<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class BookStoreApiController extends Controller
{
    public function getBooks(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'search' => 'nullable',
            'skip' => 'nullable|numeric',
            'start' => 'nullable|numeric',
        ]);
        $errors = $validation->errors();

        // If validation fails
        if ($validation->fails()) {
            return response()->json([
                'error' => $validation->errors()->first(),
            ], 400);
        } else {
            // Get skip and start values from the request query parameters
            $skip = $request->query('skip', 0);
            $start = $request->query('start', 10);

            // Fetch data from the database using skip and take (start) values
            $books = Book::skip($skip)->take($start)->orderBy('id')->get();
            $data['totalRecords'] = Book::get()->count();
            $data['bookList'] = [];
            foreach ($books as $book) {
                $tags = [];
                foreach ($book->book_tags as $book_tag) {
                    $tags[] = $book_tag->tag->name;
                }

                $data['bookList'][] = array(
                    'id' => $book->id,
                    'title' => $book->title,
                    'writer' => $book->writer,
                    'price' => $book->points,
                    'image' => $book->cover_image,
                    'tags' => $tags,
                );
            }
            return response()->json($data);
        }
    }

    public function login(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);
        $errors = $validation->errors();

        // If validation fails
        if ($validation->fails()) {
            return response()->json([
                'error' => $validation->errors()->first(),
            ], 400);
        } else {

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                $token = $user->createToken('AuthToken')->plainTextToken;

                return response()->json(['token' => $token], 200);
            }

            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function orderBook(Request $request)
    {
        // Validate request data
        $validator = Validator::make($request->all(), [
            'book_id' => 'required|exists:books,id',
            // 'quantity' => 'required|integer|min:1',
        ]);

        // If validation fails, return error response
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 400);
        }

        // Get book details
        $book = Book::findOrFail($request->book_id);

        // Check if there are enough books in stock
        if ($book->stock < 1) {
            return response()->json(['error' => 'Not enough books in stock'], 400);
        }
        if ($request->user()->points < $book->points) {
            return response()->json(['error' => 'Not enough points in your account'], 400);
        }

        // Create order
        $order = Order::create([
            'book_id' => $book->id,
            'user_id' => $request->user()->id,
            'points' => $book->points,
        ]);

        // Update book stock
        $book->decrement('stock', 1);
        $request->user()->decrement('points', $book->points);

        // Return success response
        return response()->json(['message' => 'Book ordered successfully', 'order' => $order], 201);
    }

    public function cancelOrder($id, Request $request)
    {
        // Find the order by ID
        $order = Order::where('id', $id)->where('user_id', $request->user()->id)->first();

        // If order not found, return error response
        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        // Get the associated book
        $book = Book::find($order->book_id);

        // Increment book stock
        $book->increment('stock', 1);

        // Delete the order
        $order->delete();

        // Return success response
        return response()->json(['message' => 'Order canceled successfully'], 200);
    }

    public function myOrder(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'search' => 'nullable',
            'skip' => 'nullable|numeric',
            'start' => 'nullable|numeric',
        ]);
        $errors = $validation->errors();

        // If validation fails
        if ($validation->fails()) {
            return response()->json([
                'error' => $validation->errors()->first(),
            ], 400);
        } else {
            // Get skip and start values from the request query parameters
            $skip = $request->query('skip', 0);
            $start = $request->query('start', 10);

            // Fetch data from the database using skip and take (start) values
            $orders = Order::where('user_id', $request->user()->id)->skip($skip)->take($start)->orderBy('id')->get();
            $data['totalRecords'] = Order::get()->count();
            $data['bookList'] = [];

            foreach ($orders as $order) {
                $tags = [];
                foreach ($order->book->book_tags as $book_tag) {
                    $tags[] = $book_tag->tag->name;
                }

                $data['bookList'][] = array(
                    'id' => $order->id,
                    'title' => $order->book->title,
                    'writer' => $order->book->writer,
                    'price' => $order->book->points,
                    'image' => $order->book->cover_image,
                    'tags' => $tags,
                );

            }

            // Return success response
            return response()->json($data, 201);
        }
    }

}
