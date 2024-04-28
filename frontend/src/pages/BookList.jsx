import React, { useRef, useEffect, useState } from "react";
import BookDetails from "./BookDetails";
import { useSelector, useDispatch } from "react-redux";
import { getBooks } from "../features/book/bookSlice";
import Spinner from "../components/Spinner";
import { Grid, paginationItemClasses } from "@mui/material";

const BookList = () => {
    const { books, isLoading, totalRecords } = useSelector(
        (state) => state.books
    );
    const observerTarget = useRef(null);
    const shouldStopLoadMore = useRef(false);
    const dispatch = useDispatch();
    const [page, setPage] = useState(0); // Track current page

    useEffect(() => {
        if (totalRecords <= page * 10) {
            shouldStopLoadMore.current = true;
            return;
        }
        shouldStopLoadMore.current = false;
    }, [page, totalRecords]);

    useEffect(() => {
        dispatch(getBooks({ skip: page * 10 }));
    }, [dispatch, page]);

    useEffect(() => {
        const observer = new IntersectionObserver(
            (entries) => {
                if (entries[0].isIntersecting) {
                    if (
                        !shouldStopLoadMore.current &&
                        !isLoading &&
                        totalRecords >= page * 10
                    ) {
                        setPage((prevPage) => prevPage + 1); // Increment page
                    }
                }
            },
            { threshold: 0.25 }
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

    if (!books) {
        return <Spinner />;
    }

    return (
        <div>
            <Grid
                container
                spacing={3}
                style={{ display: "flex", flexDirection: "row" }}
            >
                {books?.map((book, index) => (
                    <Grid item xs={12} sm={6} md={4} key={book.id}>
                        <BookDetails
                            key={book.id}
                            book={book}
                            canOrder={true}
                        />
                    </Grid>
                ))}
                {isLoading && <Spinner />}
            </Grid>
            <div ref={observerTarget}></div>
        </div>
    );
};

export default BookList;
