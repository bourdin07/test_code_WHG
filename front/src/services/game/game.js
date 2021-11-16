import { axiosApi } from "../..";

export class game {
  getListGames(data) {
    return axiosApi.post("/game/all", data);
  }
}
