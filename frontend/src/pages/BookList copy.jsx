import React, {useEffect,useState} from 'react'
import BookDetails from './BookDetails'
import { useSelector, useDispatch } from 'react-redux'
import { getBooks } from '../features/book/bookSlice'
import Spinner from '../components/Spinner'
import { Grid } from '@mui/material';

const BookList = () => {
    const { books } = useSelector((state) => state.books)

  const dispatch = useDispatch()

  useEffect(() => {
    dispatch(getBooks())
  }, [dispatch])

  if (!books) {
    return <Spinner/>
  }

  return (    
      <Grid container spacing={3}>
          {books.map((book) => (
            <Grid item xs={12} sm={6} md={4} key={book.id}>
                <BookDetails key={book.id} book={book} canOrder={true}/>
            </Grid>
          ))}
      </Grid>
  )
}

export default BookList


//
{/* <Grid container spacing={3}>
      {books?.map((book) => (
        <Grid item xs={12} sm={6} md={4} key={book.id}>
          <BookDetails key={book.id} book={book} canOrder={true} />
        </Grid>
      ))}
      {isLoading && <Spinner />} {/* Show spinner while loading */}
    </Grid> */}