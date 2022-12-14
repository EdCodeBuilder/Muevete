import Vue from 'vue'
import VueI18n from 'vue-i18n'
Vue.use(VueI18n)

export default ({ app }) => {
  app.i18n.path = (link) => {
    return `/${app.i18n.locale}/${link}`
  }
}
