<template>
    <div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        Featured
                    </div>
                    <div class="col-6">
                        <button class="btn btn-primary float-right" @click="getRepositories">Get Repositories</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <!-- <h5 class="card-title">Special title treatment</h5> -->
                <ul class="list-group" v-for="repository in repositories" :key="repository.id">
                    <li class="list-group-item">
                        <h1 class="h3 lh-condensed m-2">
                            <a href="#">{{ repository.full_name }}</a>
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
                                <a :href="repository.html_url">{{ repository.html_url }}</a>
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
                <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a> -->
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return{
                repositories: [],
            }
        },
        mounted() {
            // this.getRepositories();
        },
        methods: {
            getRepositories() {
                axios
                    .get('https://api.github.com/search/repositories?q=language:php+sort:stars')
                    .then(response => {
                        this.repositories = response.data.items
                    })
                    .catch(error => (
                        console.log(error)
                    ));
            }
        },
    };

</script>
