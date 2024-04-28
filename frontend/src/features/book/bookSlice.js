import { createSlice, createAsyncThunk, createAction } from "@reduxjs/toolkit";
import bookService from "./bookService";

// Get user from localstorage
const user = JSON.parse(localStorage.getItem("user"));

const initialState = {
    isLoading: false,
    books: [],
    orders: [],
    totalRecords: 0,
    totalOrders: 0,
};

// Get Books
export const getBooks = createAsyncThunk(
    "books/getAll",
    async (payload, thunkAPI) => {
        try {
            return await bookService.getBooks(payload);
        } catch (error) {
            return thunkAPI.rejectWithValue(
                error?.response?.data?.error || "Error in fetching books."
            );
        }
    }
);

// Create Book order
export const createOrder = createAsyncThunk(
    "books/create",
    async (orderData, thunkAPI) => {
        try {
            const token = thunkAPI.getState().auth.user.token;
            return await bookService.createOrder(orderData, token);
        } catch (error) {
            return thunkAPI.rejectWithValue(
                error?.response?.data?.error || "Error while creating an order."
            );
        }
    }
);

// Cancel Book order
export const cancelOrder = createAsyncThunk(
    "books/cancel-order",
    async (orderId, thunkAPI) => {
        try {
            const token = thunkAPI.getState().auth.user.token;
            return await bookService.cancelOrder(orderId, token);
        } catch (error) {
            return thunkAPI.rejectWithValue(
                error?.response?.data?.error ||
                    "Error while cancelling an order."
            );
        }
    }
);

// Get Book orders
export const getBookOrders = createAsyncThunk(
    "books/getOrder",
    async (payload, thunkAPI) => {
        try {
            const token = thunkAPI.getState().auth.user.token;
            return await bookService.getBookOrders({ payload, token });
        } catch (error) {
            return thunkAPI.rejectWithValue(
                error?.response?.data?.error || "Error in fetching orders."
            );
        }
    }
);

export const updateBookedOrders = createAsyncThunk(
    "books/updateOrder",
    async (data) => data
);

export const clearOrders = createAsyncThunk("user/logout", () => {
    return {};
});

export const bookSlice = createSlice({
    name: "book",
    initialState,
    reducers: {
        logout: (state) => {
            state.orders = [];
            state.totalOrders = 0;
            state.totalRecords = 0;
            state.books = [];
            state.isLoading = false;
        },
    },
    extraReducers: (builder) => {
        builder
            .addCase(getBooks.pending, (state) => {
                state.isLoading = false;
            })
            .addCase(getBooks.fulfilled, (state, action) => {
                state.totalRecords = action.payload.totalRecords;
                state.books = [...state.books, ...action.payload.bookList];
                state.isLoading = false;
            })
            .addCase(getBooks.rejected, (state) => {
                state.isLoading = false;
            })
            .addCase(getBookOrders.pending, (state) => {
                state.isLoading = false;
            })
            .addCase(getBookOrders.fulfilled, (state, action) => {
                state.totalOrders = action.payload.totalRecords;
                state.orders = [...state.orders, ...action.payload.bookList];
                // state.orders = action.payload;
                state.isLoading = false;
            })
            .addCase(updateBookedOrders.fulfilled, (state, action) => {
                state.orders = action.payload;
                state.totalOrders = state.totalOrders - 1;
                state.isLoading = false;
            })
            .addCase(getBookOrders.rejected, (state) => {
                state.isLoading = false;
            })
            .addCase(createOrder.pending, (state) => {
                state.isLoading = false;
            })
            .addCase(createOrder.fulfilled, (state, action) => {
                // state.orders = action.payload;
                state.isLoading = false;
            })
            .addCase(createOrder.rejected, (state) => {
                state.isLoading = false;
            })
            .addCase(cancelOrder.pending, (state) => {
                state.isLoading = false;
            })
            .addCase(cancelOrder.fulfilled, (state, action) => {
                // state.orders = action.payload;
                state.isLoading = false;
            })
            .addCase(cancelOrder.rejected, (state) => {
                state.isLoading = false;
            })
            .addCase(clearOrders.fulfilled, (state, action) => {
                state.orders = [];
                state.totalOrders = 0;
                state.totalRecords = 0;
                state.books = [];
                state.isLoading = false;
            });
    },
});

export default bookSlice.reducer;
