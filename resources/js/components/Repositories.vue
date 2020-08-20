<template>
    <div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        Featured PHP Repositories
                    </div>
                    <div class="col-6">
                        <button v-if="state.saved === 0" class="btn btn-primary float-right" @click="getDbData">Get Repositories</button>
                        <button v-else class="btn btn-primary float-right" @click="getRepositories">Update Repositories</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div v-if="repositories.length === 0">
                    <p class="text-center">No Repositories available. Click on <strong>Get Repositories</strong> button to populate list.</p>
                </div>
                <div v-else>
                <ul class="list-group" v-for="repository in repositories" :key="repository.id">
                    <li class="list-group-item">
                        <h1 class="h3 lh-condensed mt-2 mb-2">
                            <a :href="repository.html_url" target="_blank">{{ repository.full_name }}</a>
                            <small class="smallest float-right">Repository ID: {{ repository.id }}</small>
                        </h1>
                        <div class="row">
                            <div class="col-9">
                                <p class="text-gray my-1 pr-4">
                                    <small>{{ repository.description }}</small>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 url">
                                <a :href="repository.homepage">{{ repository.homepage }}</a>
                            </div>
                        </div>
                        <div class="g6 text-gray mt-2 stats">
                            <span class="d-inline-block ml-0 mr-3">
                                <i class="fa fa-calendar"></i> Created Date: {{ repository.created_at }}
                            </span>
                            <span class="d-inline-block mr-3">
                                <i class="fa fa-calendar"></i> Last Push Date: {{ repository.pushed_at }}
                            </span>
                            <span class="d-inline-block float-sm-right">
                                <i class="fa fa-star"></i> Total Stars: {{ repository.stargazers_count }}
                            </span>
                        </div>
                    </li>
                </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return{
                state: {
                    saved: 0,
                },
                repositories: [],
            }
        },

        methods: {
            getDbData() {
                axios.get('api/repositories')
                    .then(response => {
                        if (response.data.length === 0) {
                            console.log('here')
                            this.getRepositories()
                        } else {
                            this.repositories = response.data
                            this.state.saved = !this.state.saved
                        }
                    })
                    .catch(error => console.log(error));

            },

            getRepositories() {
                this.repositories = []
                axios
                    .get('https://api.github.com/search/repositories?q=language:php+sort:stars')
                    .then(response => {
                        this.repositories = response.data.items
                        this.saveOrUpdateRepositories(this.repositories)
                        this.state.saved = 1;
                    })
                    .catch(error => console.log(error));
            },

            saveOrUpdateRepositories(repositories) {
                axios
                    .post('api/repositories', this.filterRepositories(repositories))
                    .then(response => {
                        alert(`Repositories ${this.state.saved === 0 ? 'saved' : 'updated'}!`)
                        this.state.saved = 1;
                    })
                    .catch(error => console.log(error));
            },

            filterRepositories(repositories) {
                return repositories.map(repo => (
                    {
                        'repository_id': repo.id,
                        'name': repo.full_name,
                        'url': repo.html_url,
                        'last_push_date': this.convertISOToDate(repo.pushed_at),
                        'created_date': this.convertISOToDate(repo.created_at),
                        'description': repo.description,
                        'stars': repo.stargazers_count,
                    }
                ));
            },

            convertISOToDate(isoDate) {
                let date = new Date(isoDate);
                return `${date.getFullYear()}-${date.getMonth()}-${date.getDate()}`;
            }
        },
    };

</script>
