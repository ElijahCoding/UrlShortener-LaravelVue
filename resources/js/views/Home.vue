<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <form @submit.prevent="onSubmit">
                                <div class="form-group">
                                    <label for="link">Link</label>
                                    <input type="text"
                                           class="form-control"
                                           id="link"
                                           placeholder="Enter link"
                                           v-model.trim="$v.link.$model"
                                    >
                                </div>
                                <div class="error" v-if="!$v.link.required && $v.link.$dirty">Field is required</div>
                                <div class="error" v-if="!$v.link.url && $v.link.$dirty">Field must be url</div>

                                <div v-if="!$v.link.$invalid" class="form-group">
                                    <label for="local_link">Local Link</label>
                                    <input type="text"
                                           class="form-control"
                                           id="local_link"
                                           placeholder="Enter local link"
                                           v-model.trim="$v.local_link.$model"
                                    >
                                </div>
                                <div class="error" v-if="!$v.local_link.required && $v.local_link.$dirty">Field is required</div>
                                <div class="error" v-if="!$v.local_link.url && $v.local_link.$dirty">Field must be url</div>

                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Link</th>
                        <th scope="col">Local link</th>
                        <th scope="col">created_at</th>
                    </tr>
                    </thead>
                    <tbody v-if="links.length">

                        <tr v-for="link in links" :key="link.id">
                            <th scope="row">{{ link.id }}</th>
                            <td>{{ link.link }}</td>
                            <td>{{ link.local_link }}</td>
                            <td>{{ link.created_at_for_human }} ({{ link.created_at }})</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import { required, url } from 'vuelidate/lib/validators'
import { mapActions, mapGetters } from 'vuex'
export default {
    data() {
        return {
            link: 'http://',
            local_link: 'http://',
        }
    },
    validations: {
        link: {
            required,
            url,
        },
        local_link: {
            required,
            url,
        }
    },
    mounted () {
        this.getLinks()
    },
    methods: {
        ...mapActions({
            createLink: 'link/createLink',
            getLinks: 'link/getLinks',
        }),
        async onSubmit () {
            this.$v.$touch()
            if (!this.$v.$invalid) {
                await this.createLink({
                    'link': this.$v.link.$model,
                    'local_link': this.$v.local_link.$model
                })
                this.link = ''
                this.local_link = ''
                this.$nextTick(() => { this.$v.$reset() })
            }
        }
    },
    computed: {
        ...mapGetters({
            links: 'link/links',
        })
    }
}
</script>
