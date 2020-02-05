<template>
<div>
    <div class="card">
        <div class="card-header bg-info text-white">Movies done by person : {{personId}}</div>
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
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="movie in movies">
                    <td>{{movie.title}}</td>
                    <td>{{movie.episode_id}}</td>
                    <td>{{movie.director}}</td>
                    <td>{{movie.producer}}</td>
                    <td>{{movie.release_date}}</td>
                    <td><a v-bind:href="'http://localhost:8000/movie/'+movie.movie_id+'/people'">view people</a></td>
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
            let moviesData = this;
            moviesData.personId = window.location.href.split('/')[4];
            $.get("http://localhost:8000/api/person/"+moviesData.personId+"/movies", function(res){
                    // etting data
                    moviesData.movies = res;
                    console.log(res);
                },'json')
        },
        data: function(){
            return {
                 movies : {},
                 personId:null

            }  
        }
    }
</script>
