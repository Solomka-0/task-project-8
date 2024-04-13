<template>
  <div class=user-settings-module>
    <f-input name="name" v-model="user.name" @change="onChange"
             label-text="Имя пользователя. Изменение требует подтверждения"/>
    <f-input name="phone" v-model="user.phone" @change="onChange" label-text="Номер телефона"/>
    <f-input name="email" v-model="user.email" @change="onChange" label-text="Электронная почта"/>
  </div>
</template>

<script setup lang='ts'>
import {useDefaultState} from './composables/useDefault'
import FInput from "~/src/components/FInput/FInput.vue";
import GetUser from "~/api/endpoints/GetUser";
import GetSettings from "~/api/endpoints/GetSettings";
import UpdateSetting from "~/api/endpoints/UpdateSetting";
import {useNotice} from "~/src/components/Notices/composables/useNotice";

const ctx = useDefaultState()

const user = await new GetUser().request(1)
const settings = await new GetSettings().request()

// i18
const i18nPrefix = "modules.UserSettings"
const nuxtApp = useNuxtApp()
const $i = nuxtApp.$i(i18nPrefix)

const notice = useNotice()

async function onChange(event)
{
  console.log(event.target.name)

  const setting = settings!.value.find((item) => item.key === event.target.name)

  try {
    await new UpdateSetting(undefined, user!.value.id).request(setting.id, {value: event.target.value})
    notice.call('Поле сохранено / Отправлено письмо с подтверждением')
  } catch (e) {

  }
}
</script>

<style lang="scss">
@import "./style.scss";
</style>