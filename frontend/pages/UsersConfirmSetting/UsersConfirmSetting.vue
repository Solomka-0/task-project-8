<template>
  <div class="users-confirm-setting-page">
  </div>
</template>

<script setup="ts">
import {defineI18nRoute} from "#i18n";

// i18
const i18nPrefix = "pages.UsersConfirmSetting"
const nuxtApp = useNuxtApp()
const $i = nuxtApp.$i(i18nPrefix)

const $router = useRouter()
const $localePath = useLocalePath()
const $getPageName = nuxtApp.$getPageName

onBeforeMount(async () => {
  const params = $router.currentRoute.value.params;
  const response = await $fetch(`/api/users/confirm-setting/${params.confirmation_id}/${params.code}`)
  return navigateTo($localePath($getPageName('Solution')))
})

defineI18nRoute({
  paths: {
    'en': '/users/confirm-setting/:confirmation_id/:code',
    'de': '/users/confirm-setting/:confirmation_id/:code',
    'es': '/users/confirm-setting/:confirmation_id/:code',
    'fr': '/users/confirm-setting/:confirmation_id/:code',
    'it': '/users/confirm-setting/:confirmation_id/:code',
    'pt': '/users/confirm-setting/:confirmation_id/:code',
    'zh': '/users/confirm-setting/:confirmation_id/:code',
    'ja': '/users/confirm-setting/:confirmation_id/:code',
    'ko': '/users/confirm-setting/:confirmation_id/:code',
    'ru': '/users/confirm-setting/:confirmation_id/:code',
    'hi': '/users/confirm-setting/:confirmation_id/:code',
    'pl': '/users/confirm-setting/:confirmation_id/:code',
    'cs': '/users/confirm-setting/:confirmation_id/:code',
  }
})

</script>

<style>
@import "./style.scss";
</style>