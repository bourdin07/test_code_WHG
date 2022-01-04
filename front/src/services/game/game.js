import { axiosApi } from "../..";

export class game {
  getListGames(data) {
    return axiosApi.get("/game/all", { params: {...data}});
  }
}
