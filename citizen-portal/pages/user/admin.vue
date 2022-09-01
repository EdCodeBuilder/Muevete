<template>
  <v-data-table-card
    ref="tableCard"
    storage-path="admin"
    card-title="titles.AdminUsers"
    card-icon="mdi-card-account-details"
    :model="model"
    :show-excel-button="false"
    :show-create-button="canCreateAction"
    :show-update-button="canUpdateAction"
    :show-delete-button="canDeleteAction"
    :show-history-button="canViewHistoryAction"
  >
    <template #[`item.is_initiate`]="{ item }">
      {{ item.is_initiate ? 'SI' : 'NO' }}
    </template>
    <template #form="{ model }">
      <v-admin-form
        @success="$refs.tableCard.refresh()"
        @error="$refs.tableCard.refresh()"
        :form-data="model.data()"
      />
    </template>
  </v-data-table-card>
</template>

<router lang="yaml">
meta:
  title: AdminUsers
</router>

<script>
// import _ from 'lodash'
import { Api } from '~/models/Api'
import { Admin } from '~/models/services/citizen/Admin'
import { Menu } from '~/models/services/citizen/Menu'
import AbilityService from '~/models/services/citizen/AbilityService'

export default {
  name: 'AdminUsers',
  auth: 'auth',
  nuxtI18n: {
    paths: {
      en: '/user/admin',
      es: '/usuario/administracion',
    },
  },
  head: (vm) => ({
    title: vm.$t('titles.AdminUsers'),
  }),
  middleware: ['permissions'],
  meta: {
    permissionsUrl: Api.END_POINTS.CITIZEN_PERMISSIONS(),
    permissions(bouncer, to, from) {
      const service = new AbilityService()
      const manage = service.manage(service.models.USERS)
      const view = service.view(service.models.USERS)
      const create = service.create(service.models.USERS)
      const destroy = service.destroy(service.models.USERS)
      const abilities = service.manageAbilities(service.models.USERS)
      return (
        bouncer.can(create) ||
        bouncer.can(destroy) ||
        bouncer.can(view) ||
        bouncer.can(manage) ||
        bouncer.canAny(abilities)
      )
    },
  },
  components: {
    // BaseMaterialCard: () => import('~/components/base/MaterialCard'),
    // TimeAgo: () => import('~/components/base/TimeAgo'),
    VDataTableCard: () => import('@/components/base/VDataTableCard'),
    VAdminForm: () => import('@/components/citizen/VAdminForm'),
  },
  created() {
    this.drawerModel = new Menu()
  },
  data: () => ({
    model: new Admin(),
    finding: false,
    form: new Admin(),
    users: [],
    roles_data: [],
    requested_at: null,
    search_user: null,
    people: [],
    selected_user: {},
  }),
  /* watch: {
    search_user(val) {
      return val && val.length > 3 && this.findUser(val)
    },
  },
  fetch() {
    this.getUsers()
    this.form
      .rolesData()
      .then((response) => {
        this.roles_data = response.data
      })
      .catch((errors) => {
        this.$snackbar({ message: errors.message })
      })
  },
  methods: {
    getUsers() {
      this.start()
      this.form
        .index()
        .then((response) => {
          this.users = response.data
          this.requested_at = response.requested_at
        })
        .catch((errors) => {
          this.$snackbar({ message: errors.message })
        })
        .finally(() => this.stop())
    },
    findUser(val) {
      this.start()
      this.form
        .findUser({ params: { username: val } })
        .then((response) => {
          this.people = response.data
        })
        .catch((errors) => {
          this.$snackbar({ message: errors.message })
        })
        .finally(() => this.stop())
    },
    setSelectedUser(item) {
      this.selected_user = item
    },
    getInitials(item) {
      return `${(item.name || '').charAt(0).toUpperCase()}${(item.surname || '')
        .charAt(0)
        .toUpperCase()}`
    },
    onDelete(roles, user) {
      this.start()
      this.form
        .retractRole(user, { params: { roles } })
        .then((response) => {
          this.$snackbar({ message: response.data, color: 'success' })
        })
        .then(() => this.getUsers())
        .catch((errors) => {
          this.$snackbar({ message: errors.message })
        })
        .finally(() => this.stop())
    },
    setRole() {
      if (this.selected_user.id) {
        this.start()
        this.form
          .assignRole(this.selected_user.id)
          .then((response) => {
            this.$snackbar({ message: response.data, color: 'success' })
          })
          .then(() => this.getUsers())
          .catch((errors) => {
            this.$snackbar({ message: errors.message })
          })
          .finally(() => this.stop())
      } else {
        this.$snackbar({ message: 'Selecciona un rol para continuar.' })
      }
    },
    customFilter(item, queryText, itemText) {
      const text = _.toLower(queryText)
      return _.filter(item, function (object) {
        return _(object).some(function (string) {
          return _(string).toLower().includes(text)
        })
      })
    },
    // Loading
    start() {
      this.finding = true
    },
    stop() {
      this.finding = false
    },
  }, */
  computed: {
    canCreateAction() {
      return this.canManageOrCreate(this.ability_service.models.USERS)
    },
    canUpdateAction() {
      return this.canManageOrUpdate(this.ability_service.models.USERS)
    },
    canDeleteAction() {
      return this.canManageOrDestroy(this.ability_service.models.USERS)
    },
    canViewHistoryAction() {
      return this.canViewHistory(this.ability_service.models.USERS)
    },
  },
}
</script>
