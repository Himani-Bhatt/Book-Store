import { FaSignInAlt, FaSignOutAlt, FaUser, FaListUl } from 'react-icons/fa'
import { Link, useNavigate } from 'react-router-dom'
import { useSelector, useDispatch } from 'react-redux'
import { logout } from '../features/auth/authSlice'
import { useLocation } from 'react-router-dom';
import { Box } from '@mui/material';
import { clearOrders } from "../features/book/bookSlice";

function Header() {
  const navigate = useNavigate()
  const dispatch = useDispatch()
  const { user } = useSelector((state) => state.auth)
  const location = useLocation();
  const currentRoute = location.pathname;

  const onLogout = async () => {
    await dispatch(logout())
   await  dispatch(clearOrders())
    navigate('/login')
  }

  return (
    <header className='header'>
      <Box className='logo'>
        <Link to='/' style={{color: currentRoute.includes('my-order')? 'grey':'black' }} >Books</Link>
      </Box>
      <ul>
        {user ? (
            <>
                <li>
                    <Link to='/my-order' style={{color: currentRoute.includes('my-order')? 'black':'grey' }}>
                        <FaListUl /> My Order
                    </Link>
                </li>
                <li>
                    <button className='btn' onClick={onLogout}>
                    <FaSignOutAlt /> Logout
                    </button>
                </li>
            </>
        ) : (
          <>
            <li>
              <Link to='/login'>
                <FaSignInAlt /> Login
              </Link>
            </li>
          </>
        )}
      </ul>
    </header>
  )
}

export default Header
