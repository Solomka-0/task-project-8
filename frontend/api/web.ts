import type {APIResponse} from "~/types/APIResponse";
import type {Ref} from "@vue/reactivity";
import {distDir} from "@nuxt/devtools/dist/dirs";

export enum ApiMethods {
    GET = "GET",
    POST = "POST",
    PUT = "PUT",
    DELETE = "DELETE"
}

export class BaseApiRequest<Request, Response> {
    protected endpoint?: string
    protected addition?: string
    protected method: ApiMethods = ApiMethods.POST
    protected _requestBody?: Request
    protected _response?: Ref<Response>

    constructor(requestBody?: Request, addition?: string) {
        this._requestBody = requestBody
        this.addition = addition
    }

    async request(id?: string | number, body?: Request, callback?: (response: Response) => void) {
        try {
            let query
            const options = {
                method: this.method
            }

            if (this.method === ApiMethods.DELETE) {
                options['headers'] = {
                    'Content-Type': 'application/json',
                }
                options['body'] = {}
            }

            if (this.method === ApiMethods.GET) {
                options['headers'] = {
                    'Content-Type': 'application/json',
                }
                query = `?${new URLSearchParams(this._requestBody)}`
            } else if (!!this._requestBody || !!body) {
                options['body'] = this._requestBody ?? body
            }

            const response = await $fetch<APIResponse<Response>>(this.endpoint + (this.addition ?? '') + (id ? `${id}` : '') + (query ?? ''), options)
            this._response = ref(response)

            if (!!callback) {
                callback(this._response?.value)
            }
        } catch (e) {
            throw e
        }
        return this._response
    }

    get response() {
        return this._response
    }

    set requestBody(requestBody: Request) {
        this._requestBody = requestBody
        console.log('nice', this._requestBody)
    }

    // get responseBody(): Response {
    //     if (this._responseBody === undefined) {
    //         // this._getResponse()
    //         console.log('undefined')
    //     }
    //     return this._responseBody!
    // }
}
