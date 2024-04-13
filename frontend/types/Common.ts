export type User = {
    id: number,
    name: string,
    phone: string,
    email: string,
    settings: Object
}

export type Setting = {
    id: number,
    key: string,
    type: string,
    is_basic: boolean,
    default: string
}

export type Settings = Setting[]