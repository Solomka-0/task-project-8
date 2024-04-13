import {ApiMethods, BaseApiRequest} from "~/api/web";
import type {User} from "~/types/Common";

export type Request = {
    value: string
}

export type Response = User

export default class UpdateSetting extends BaseApiRequest<Request, Response> {
    method = ApiMethods.PUT

    public endpoint = '/api/user/'

    constructor(requestBody?: Request, user_id?: string) {
        super(requestBody, `${user_id}/setting/`);
    }
}