import { Navbar, Nav } from 'react-bootstrap'
import { Link } from 'react-router-dom'
function Header() {
    return (
        <div>
            <Navbar bg="dark" variant="dark">
                <Navbar.Brand href="#home">BanKing</Navbar.Brand>
                <Nav className="mr-auto navbar_warapper">
                    <Link to="/login">Login</Link>
                    <Link to="/register">Register</Link>
                    <Link to="/transfer">Transfer</Link>
                </Nav>
            </Navbar>
        </div>
    )
}
export default Header