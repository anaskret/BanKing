import logo from './logo.svg';
import './App.css';
import {Button} from 'react-bootstrap'
import Header from './Header'
import {BrowserRouter, Route} from 'react-router-dom'
import Login from './Login'
import Register from './Register'
import Transfer from './Transfer'
function App() {
  return (
    <div className="App">
      <BrowserRouter>
      <Header/>
     <h1>BanKing</h1>
     <Route path = "/login">
       <Login />
       </Route>
       <Route path = "/register">
       <Register/>
       </Route>
       <Route path = "/transfer">
       <Transfer/>
       </Route>
     </BrowserRouter>
    </div>
  );
}

export default App;
