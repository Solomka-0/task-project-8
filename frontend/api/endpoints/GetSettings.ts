import {ApiMethods, BaseApiRequest} from "~/api/web";
import type {Settings} from "~/types/Common";

export type Response = Settings

export default class GetUser extends BaseApiRequest<Request, Response> {
    method = ApiMethods.GET

    public endpoint = '/api/user-settings'
}