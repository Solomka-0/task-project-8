import {ApiMethods, BaseApiRequest} from "~/api/web";
import type {User} from "~/types/Common";

export type Response = User

export default class GetUser extends BaseApiRequest<Request, Response> {
    method = ApiMethods.GET

    public endpoint = '/api/user/'
}