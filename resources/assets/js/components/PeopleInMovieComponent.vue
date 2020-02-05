<template>
<div>
    <div class="card">
        <div class="card-header bg-info text-white">People worked in movie : {{movieId}}</div>
        <!-- table content -->
        <div class="result-table-wrap">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Height</th>
                    <th>Mass</th>
                    <th>Hair Color</th>
                    <th>Skin Color</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="person in people">
                    <td>{{person.name}}</td>
                    <td>{{person.height}}</td>
                    <td>{{person.mass}}</td>
                    <td>{{person.hair_color}}</td>
                    <td>{{person.skin_color}}</td>
                    <td>{{person.gender}}</td>
                    <td><a v-bind:href="'http://localhost:8000/person/'+person.person_id+'/movies'">view movies</a></td>
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
                
                let peopleData = this;
                peopleData.movieId = window.location.href.split('/')[4];
                $.get("http://localhost:8000/api/movie/"+peopleData.movieId+"/people/", function(res){
                    // etting data
                    peopleData.people = res;
                    //console.log(res);
                },'json')
        },
        data: function(){
            return {
                 people : {},
                 movieId : null
            }  
        }
    }
</script>
