import './App.css';
import { Container, Col, Row, Button, Form, Card, ListGroup } from "react-bootstrap";
import { service } from '.';
import { createContext, useState } from 'react';
import { Formik } from "formik";
import * as Yup from "yup";
import { NotificationContainer, NotificationManager } from 'react-notifications';
import MyForm from './components/MyForm';
import ListGame from './components/ListGame';

export const AppContext = createContext();

const App = ({ }) => {
  const [listBrandGame, setListBrandGame] = useState([]);

  const createNotification = (type, message = "", title = "") => {
    switch (type) {
      case 'info':
        return NotificationManager.info(message, title);
        break;
      case 'success':
        return NotificationManager.success(message, title);
        break;
      case 'warning':
        return NotificationManager.warning(message, 'Close after 3000ms', 3000);
        break;
      case 'error':
        return NotificationManager.error(message, 'Click me!', 5000, () => {
          alert('callback');
        });
        break;
    }
  }

  return (
    <AppContext.Provider value={{createNotification}}>
      <div className="App">
        <header className="App-header">

        </header>
        <Container>
          <Card>

            <Card.Header>
              <Row>
                {/* Form */}
                <MyForm setListBrandGame={setListBrandGame} />
              </Row>
            </Card.Header>

            {/* List Game content */}
            <Card.Body>
              <Row>
                <ListGame
                  listBrandGame={listBrandGame}
                />
              </Row>
            </Card.Body>

          </Card>
          <Row>

          </Row>
        </Container>
        <footer>

        </footer>
        <NotificationContainer />
      </div>
    </AppContext.Provider>
  );
}

export default App;
