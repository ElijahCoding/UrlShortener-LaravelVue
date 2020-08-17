<template>
    <div v-if="authUser">
        <router-view :key="$route.fullPath"></router-view>
    </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';

export default {
    name: "App",
    mounted() {
        this.fetchAuthUser()
    },
    created() {
        this.setPageTitle(this.$route.meta.title)
    },
    computed: {
        ...mapGetters({
            authUser: 'user/authUser',
        }),
    },
    methods: {
        ...mapActions({
            setPageTitle: 'setPageTitle',
            fetchAuthUser: 'user/fetchAuthUser',
        })
    },
    watch: {
        $route(to, from) {
            this.setPageTitle(to.meta.title)
        }
    }
}
</script>

<style scoped>
</style>
