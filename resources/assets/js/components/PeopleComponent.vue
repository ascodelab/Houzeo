<template>
<div>
    <div class="card">
        <div class="card-header bg-info text-white">People</div>
        <div class="card-body">
            <button type="button" class="btn btn-info text-white" v-on:click="fetchPeople">{{fetchButtonText}}</button>
            <button type="button" class="btn btn-info text-white" v-on:click="savePeople">{{saveButtonText}}</button>
        </div>
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
                 people : {}
            }  
        },
        methods:{
            fetchPeople:function(){
                // changing button text
                let peopleData = this;
                peopleData.fetchButtonText = "Fetching..";
                $.get("https://swapi.co/api/people/", function(res){
                    // changing button text
                    peopleData.fetchButtonText = "Fetch";
                    // etting data
                    peopleData.people = res.results;
                    console.log(res);
                },'json')
            },
            //saving data into data base
            savePeople:function(){
                let peopleData = this;
                // changing button text
                peopleData.saveButtonText = "Saving..";
                //send ajax request
                axios.post('http://localhost:8000/api/people', 
                    // data need to be send
                    { 
                        data:peopleData.people
                    })
                    .then(function (response) {
                        peopleData.saveButtonText = "Saved!";
                        console.log(response);
                    })
                    .catch(function (error) {
                        // Wu oh! Something went wrong
                        console.log(error.message);
                });
            }
        }
    }
</script>
