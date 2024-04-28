import { useEffect, useState } from "react";
import { toast } from "react-toastify";
import Modal from "react-modal";
import { FaPlus, FaTimesCircle } from "react-icons/fa";
import { useSelector, useDispatch } from "react-redux";
import { useParams, useNavigate } from "react-router-dom";
import { cancelOrder, createOrder } from "../features/book/bookSlice";
import Spinner from "../components/Spinner";
import {
    Box,
    Card as MuiCard,
    CardContent,
    CardMedia,
    Typography,
    Button,
    Chip,
} from "@mui/material";
import "./style.css";
import { getBookOrders, updateBookedOrders } from "../features/book/bookSlice";

const customStyles = {
    content: {
        width: "600px",
        top: "50%",
        left: "50%",
        right: "auto",
        bottom: "auto",
        marginRight: "-50%",
        transform: "translate(-50%, -50%)",
        position: "relative",
    },
};

Modal.setAppElement("#root");

function BookDetails({ book, canCancel, canOrder }) {
    const { user } = useSelector((state) => state.auth);
    const { orders } = useSelector((state) => state.books);

    const [modalIsOpen, setModalIsOpen] = useState(false);
    const [orderModalIsOpen, setOrderModalIsOpen] = useState(false);

    const navigate = useNavigate();
    const dispatch = useDispatch();

    const customStyles = {
        content: {
            width: "600px",
            top: "50%",
            left: "50%",
            right: "auto",
            bottom: "auto",
            marginRight: "-50%",
            transform: "translate(-50%, -50%)",
            position: "relative",
        },
    };

    const onOrderCancel = (e) => {
        e.preventDefault();
        dispatch(cancelOrder(book.id))
            .unwrap()
            .then(() => {
                closeModal();
                toast.success("Order cancelled successfully.");
                const updatedOrders = orders.filter(
                    (order) => order.id !== book.id
                );
                dispatch(updateBookedOrders(updatedOrders));
            })
            .catch(toast.error);
    };

    const onOrderCreate = (e) => {
        e.preventDefault();
        // Navigate to login page if user is not logged in
        if (!user) {
            closeOrderModal();
            toast.success("You must have to login first to create an order");
            navigate("/login");
            return;
        }

        // Create an order if user is already logged in
        dispatch(createOrder({ book_id: book.id }))
            .unwrap()
            .then(() => {
                closeOrderModal();
                toast.success("Order created successfully.");
                navigate("/my-order");
            })
            .catch(toast.error);
    };

    // Open/close cancel order modal
    const openModal = () => setModalIsOpen(true);
    const closeModal = () => setModalIsOpen(false);

    // Open/close create order modal
    const openOrderModal = () => setOrderModalIsOpen(true);
    const closeOrderModal = () => setOrderModalIsOpen(false);

    // if (!book) {
    //   return <Spinner/>
    // }

    return (
        <MuiCard className="card">
            <CardMedia
                component="img"
                height="200"
                image={book.image}
                alt={book.title}
            />
            <CardContent>
                <Typography gutterBottom color="white" variant="h5" component="div">
                    {book.id}
                </Typography>
                <Typography gutterBottom variant="h5" component="div">
                    {book.title}
                </Typography>
                <Typography
                    variant="subtitle1"
                    color="text.secondary"
                    gutterBottom
                >
                    {book.writer}
                </Typography>
                <Typography
                    variant="h6"
                    color="text.primary"
                    className="card-price"
                >
                    ${book.price}
                </Typography>
                <div className="tag-container">
                    {book.tags.map((tag, index) => (
                        <Chip
                            key={index}
                            label={tag}
                            sx={{
                                backgroundColor: "#000",
                                color: "#fff",
                                margin: "5px",
                            }}
                        />
                    ))}
                </div>

                {canCancel && (
                    <Button
                        onClick={openModal}
                        variant="contained"
                        sx={{
                            backgroundColor: "#000",
                            color: "#fff",
                            border: "none",
                            padding: "10px 20px",
                            borderRadius: "5px",
                            cursor: "pointer",
                            transition: "background-color 0.3s ease",
                            "&:hover": {
                                backgroundColor: "#333",
                            },
                        }}
                    >
                        <FaTimesCircle /> Cancel Oder
                    </Button>
                )}

                {canOrder && (
                    <Button
                        onClick={openOrderModal}
                        variant="contained"
                        sx={{
                            backgroundColor: "#000",
                            color: "#fff",
                            border: "none",
                            padding: "10px 20px",
                            borderRadius: "5px",
                            cursor: "pointer",
                            transition: "background-color 0.3s ease",
                            "&:hover": {
                                backgroundColor: "#333",
                            },
                        }}
                    >
                        <FaPlus /> Create Order
                    </Button>
                )}
            </CardContent>

            <Modal
                isOpen={modalIsOpen}
                onRequestClose={closeModal}
                contentLabel="Cancel Order"
                style={customStyles}
            >
                <h2>Cancel Order</h2>
                <button
                    style={{ padding: "16px" }}
                    className="btn-close"
                    onClick={closeModal}
                >
                    X
                </button>
                <form onSubmit={onOrderCancel}>
                    <div className="form-group">
                        Are you sure you want to cancel this order?
                    </div>
                    <div
                        style={{ display: "flex", gap: 2 }}
                        className="form-group"
                    >
                        <button className="btn" type="submit">
                            Yes
                        </button>
                        <button
                            className="btn"
                            type="button"
                            onClick={closeModal}
                        >
                            No
                        </button>
                    </div>
                </form>
            </Modal>

            <Modal
                isOpen={orderModalIsOpen}
                onRequestClose={closeOrderModal}
                style={customStyles}
                contentLabel="Create Order"
            >
                <h2>Create Order</h2>
                <button
                    style={{ padding: "16px" }}
                    className="btn-close"
                    onClick={closeOrderModal}
                >
                    X
                </button>
                <form onSubmit={onOrderCreate}>
                    <div className="form-group">Title: {book.title}</div>
                    <div className="form-group">Writer: {book.writer}</div>
                    <div className="form-group">Price: ${book.price}</div>
                    <div className="form-group">
                        <button className="btn" type="submit">
                            Create Order
                        </button>
                    </div>
                </form>
            </Modal>
        </MuiCard>
    );
}

export default BookDetails;
