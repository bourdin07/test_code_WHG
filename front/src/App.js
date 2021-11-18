import './App.css';
import { Container, Col, Row, Button, Form, Card, ListGroup } from "react-bootstrap";
import { service } from '.';
import { useState } from 'react';
import { Formik } from "formik";
import * as Yup from "yup";
import { NotificationContainer, NotificationManager } from 'react-notifications';

const App = ({ }) => {
  const listCategory = [
    { value: "all", label: "All category" },
    { value: "Category 1", label: "Category 1" },
    { value: "Category 2", label: "Category 2" },
    { value: "Category 3", label: "Category 3" },
  ]
  const listCountry = [
    { value: "UK", label: "UK" },
    { value: "US", label: "US" },
    { value: "FR", label: "FR" },
    { value: "KR", label: "KR" },
    { value: "CS", label: "CS" },
  ];
  const listBrandid = [
    { value: 0, label: 0 },
    { value: 1, label: 1 },
    { value: 2, label: 2 },
    { value: 3, label: 3 },
  ];
  const [listBrandGame, setListBrandGame] = useState([]);
  const [dataToSend, setDataToSend] = useState({});

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

  const getListGames = () => {
    service.game
      .getListGames(dataToSend)
      .then((response) => {
        console.log(response.data);
        setListBrandGame(response.data);
      });
  }

  return (
    <div className="App">
      <header className="App-header">

      </header>
      <Container>
        <Card>

          <Card.Header>
            <Row>
              <Formik
                initialValues={{
                  brandid: 1,
                  country: "UK",
                  category: "all"
                }}
                onSubmit={async (values) => {
                  dataToSend.brandid = values.brandid;
                  dataToSend.country = values.country;
                  dataToSend.category = values.category;
                  getListGames();
                }}
              >
                {({ values, handleSubmit, handleChange }) => (
                  <Form>
                    <Row>
                      <Col>
                        <Form.Group className="mb-3" controlId="country">
                          <Form.Label>Country</Form.Label>
                          <Form.Control
                            name="country"
                            as="select"
                            onChange={handleChange("country")}
                            value={values.country}
                          >
                            {listCountry.map((option, index) => {
                              return (
                                <option
                                  key={`option-${index}`}
                                  value={option.value}>
                                  {option.label || option.value}
                                </option>
                              );
                            })}
                          </Form.Control>
                        </Form.Group>
                      </Col>
                      <Col>
                        <Form.Group className="mb-3" controlId="brandid">
                          <Form.Label>Brandid</Form.Label>
                          <Form.Control
                            name="brandid"
                            as="select"
                            onChange={handleChange("brandid")}
                            value={values.brandid}
                          >
                            {listBrandid.map((option, index) => {
                              return (
                                <option
                                  key={`option-${index}`}
                                  value={option.value}>
                                  {option.label || option.value}
                                </option>
                              );
                            })}
                          </Form.Control>
                        </Form.Group>
                      </Col>
                      <Col>
                        <Form.Group className="mb-3" controlId="category">
                          <Form.Label>Category</Form.Label>
                          <Form.Control
                            name="category"
                            as="select"
                            onChange={handleChange("category")}
                            value={values.category}
                          >
                            {listCategory.map((option, index) => {
                              return (
                                <option
                                  key={`option-${index}`}
                                  value={option.value}>
                                  {option.label || option.value}
                                </option>
                              );
                            })}
                          </Form.Control>
                        </Form.Group>
                      </Col>
                    </Row>

                    <Row>
                      <Button
                        type="submit"
                        variant="outline-success"
                        size="sm"
                        className="btn-validation"
                        onClick={handleSubmit}
                      >
                        Get
                      </Button>
                    </Row>
                  </Form>
                )}
              </Formik>
            </Row>
          </Card.Header>

          <Card.Body>
            <Row>
              <ListGroup variant="flush">
                {listBrandGame.map((gameBrande, index) => {
                  return (
                    <ListGroup.Item
                      key={`list-item-${index}`}
                      onClick={() => {
                        console.log(gameBrande.game.launchcode);
                        // alert("launchcode : " + gameBrande.game.launchcode);
                        createNotification("info", "launchcode = " + gameBrande.game.launchcode);
                      }}
                    >
                      <Row>
                        <Col>
                          <img
                            src={`httpsBrand://stage.whgstage.com/scontent/images/games/${gameBrande.game.launchcode}.jpg`}
                            alt={"Image of game : " + gameBrande.game.name}
                          />
                        </Col>
                        <Col>
                          <p>Name : {gameBrande.game.name}</p>
                          <p>Category : {gameBrande.category}</p>
                          <p>rtp : {gameBrande.game.rtp}</p>
                          <p>Hot : {gameBrande.hot ? "Yes" : "No"}</p>
                          <p>New : {gameBrande.new ? "Yes" : "No"}</p>
                          <p>Game provider : {gameBrande.game.gameProvider.name}</p>
                          <p>Brandid : {gameBrande.brandid}</p>
                        </Col>
                      </Row>
                    </ListGroup.Item>
                  );
                })}
              </ListGroup>
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
  );
}

export default App;
