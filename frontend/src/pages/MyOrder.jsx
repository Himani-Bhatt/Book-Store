import React, { useEffect, useState, useRef } from "react";
import BookDetails from "./BookDetails";
import { useSelector, useDispatch } from "react-redux";
import { getBookOrders } from "../features/book/bookSlice";
import Spinner from "../components/Spinner";
import { Grid } from "@mui/material";

const MyOrder = () => {
    const { orders, isLoading, totalOrders } = useSelector(
        (state) => state.books
    );

    const dispatch = useDispatch();
    const observerTarget = useRef(null);
    const shouldStopLoadMore = useRef(false);
    const [page, setPage] = useState(0); // Track current page

    useEffect(() => {
        if (totalOrders <= page * 10) {
            shouldStopLoadMore.current = true;
            return;
        }
        shouldStopLoadMore.current = false;
    }, [page, totalOrders]);

    useEffect(() => {
        dispatch(getBookOrders({ skip: page * 10 }));
    }, [dispatch, page]);

    useEffect(() => {
        const observer = new IntersectionObserver(
            (entries) => {
                if (
                    entries[0].isIntersecting &&
                    !shouldStopLoadMore.current &&
                    !isLoading &&
                    totalOrders >= page * 10
                ) {
                    setPage((prevPage) => prevPage + 1); // Increment page
                }
            },
            { threshold: 1 }
        );

        if (observerTarget.current) {
            observer.observe(observerTarget.current);
        }

        return () => {
            if (observerTarget.current) {
                observer.unobserve(observerTarget.current);
            }
        };
    }, [observerTarget]);

    if (isLoading) {
        return <Spinner />;
    }

    if (orders.length === 0) {
        return <h1>No data found!</h1>;
    }

    return (
        <>
            <Grid container spacing={3}>
                {orders?.map((book, index) => (
                    <Grid item xs={12} sm={6} md={4} key={index}>
                        <BookDetails key={index} book={book} canCancel={true} />
                    </Grid>
                ))}
            </Grid>
            <div ref={observerTarget}></div>
        </>
    );
};

export default MyOrder;
