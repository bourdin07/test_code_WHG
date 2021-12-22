import { useContext } from "react";
import { Container, Col, Row, Button, Form, Card, ListGroup } from "react-bootstrap";
import { AppContext } from "../App";

const ListGame = ({ listBrandGame }) => {
  const contextValue = useContext(AppContext);

  return (
    <>
      <ListGroup variant="flush">
        {listBrandGame.map((gameBrande, index) => {
          return (
            <ListGroup.Item
              key={`list-item-${index}`}
              onClick={() => {
                console.log(gameBrande.game.launchcode);
                // alert("launchcode : " + gameBrande.game.launchcode);
                contextValue.createNotification("info", "launchcode = " + gameBrande.game.launchcode);
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
    </>
  )
}

export default ListGame;
