<template>
    <div v-if="authUser">
        <router-view :key="$route.fullPath"></router-view>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';

export default {
    name: "App",
    mounted() {
        this.$store.dispatch('fetchAuthUser');
    },
    created() {
        this.$store.dispatch('setPageTitle', this.$route.meta.title);
    },
    computed: {
        ...mapGetters({
            authUser: 'authUser',
        }),
    },
    watch: {
        $route(to, from) {
            this.$store.dispatch('setPageTitle', to.meta.title);
        }
    }
}
</script>

<style scoped>
</style>
