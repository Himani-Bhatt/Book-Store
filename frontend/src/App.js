import logo from "./logo.svg";
import "./App.css";
import BookList from "./pages/BookList";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import Login from "./pages/Login";
import MyOrder from "./pages/MyOrder";
import PrivateRoute from "./components/PrivateRoute";
import Header from "./components/Header";
import { ToastContainer } from "react-toastify";
import "react-toastify/dist/ReactToastify.css";

function App() {
    return (
        <>
            <div>
                <Router>
                    <div className="container">
                        <Header />
                        <Routes>
                            <Route path="/" element={<BookList />} />
                            <Route path="/login" element={<Login />} />
                            <Route
                                path="/my-order"
                                element={
                                    <PrivateRoute>
                                        <MyOrder />
                                    </PrivateRoute>
                                }
                            />
                        </Routes>
                    </div>
                </Router>
                <ToastContainer />
            </div>
        </>
    );
}

export default App;
