<template>
<div>
    <div class="card">
        <div class="card-header bg-info text-white">Movies</div>
        <div class="card-body">
            <button type="button" class="btn btn-info text-white" v-on:click="fetchMovies">{{fetchButtonText}}</button>
            <button type="button" class="btn btn-info text-white" v-on:click="fetchMovies">{{saveButtonText}}</button>
        </div>
        <!-- table content -->
        <div class="result-table-wrap">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Episode</th>
                    <th>Director</th>
                    <th>Producer</th>
                    <th>Released</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="movie in movies">
                    <td>{{movie.title}}</td>
                    <td>{{movie.episode_id}}</td>
                    <td>{{movie.director}}</td>
                    <td>{{movie.producer}}</td>
                    <td>{{movie.release_date}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>   
</div>
</template>

<script>
    export default {   
        mounted() {

        },
        data: function(){
            return {
                 fetchButtonText:'Fetch',
                 saveButtonText:'save',
                 movies : {}
            }  
        },
        methods:{
            fetchMovies:function(){
                // changing button text
                let moviesData = this;
                moviesData.fetchButtonText = "Fetching..";
                $.get("https://swapi.co/api/films/", function(res){
                    // changing button text
                    moviesData.fetchButtonText = "Fetch";
                    // etting data
                    moviesData.movies = res.results;
                    console.log(res);
                },'json')
            }
        }
    }
</script>
