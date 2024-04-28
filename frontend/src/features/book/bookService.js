import axios from "axios";

const API_URL = "http://127.0.0.1:8000/api/";

// Get books
const getBooks = async (params) => {
    const response = await axios.get(`${API_URL}books?skip=${params.skip}`);

    return response.data;
};

// Get books
const getBookOrders = async ({ payload, token }) => {
    const config = {
        headers: {
            Authorization: `Bearer ${token}`,
        },
    };
    const response = await axios.get(
        `${API_URL}my-order?skip=${payload.skip ? payload.skip : 0}`,
        config
    );

    return response.data;
};

// Create new order
const createOrder = async (orderData, token) => {
    const config = {
        headers: {
            Authorization: `Bearer ${token}`,
        },
    };

    const response = await axios.post(
        API_URL + "order-book",
        orderData,
        config
    );

    return response.data;
};

// Cancel book order
const cancelOrder = async (orderId, token) => {
    const config = {
        headers: {
            Authorization: `Bearer ${token}`,
        },
    };

    const response = await axios.delete(
        API_URL + "cancel-order/" + orderId,
        config
    );

    return response.data;
};

const bookService = {
    getBooks,
    getBookOrders,
    createOrder,
    cancelOrder,
};

export default bookService;
