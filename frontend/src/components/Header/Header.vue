<template>
  <div class=header>
    <div class="container">
      <div class="header__logo">
        <div class="header__logo-text">
          <div class="header__logo-caption">
            Пользовательские настройки
          </div>
          <div class="header__logo-description">
            Изменение с подтверждением
          </div>
        </div>
      </div>
      <div class="header__nav">
        <nuxt-link :to="item.path" v-for="item in nav"
                   class="header__nav-item"
                   :class="{'header__nav-item_active': item.path === router.currentRoute.value.path}">
          {{ item.caption }}
        </nuxt-link>
      </div>
    </div>
  </div>
</template>

<script setup lang='ts'>
import { useDefaultState } from './composables/useDefault'
import Home from "~/pages/Home/Home.vue";

// i18
const i18nPrefix = "components.Header"
const nuxtApp = useNuxtApp()
const $i = nuxtApp.$i(i18nPrefix)

const localePath = useLocalePath()
const getPageName: Function = nuxtApp.$getPageName

const ctx = useDefaultState()

type NavItem = {
  caption: string,
  path: string,
}

const nav: NavItem[] = [
  {
    caption: "Главная",
    path: localePath(getPageName('Home'))
  },
  {
    caption: "Решение",
    path: localePath(getPageName('Solution'))
  }
]

const router = useRouter()
</script>

<style lang="scss">
@import "./style.scss";
</style>