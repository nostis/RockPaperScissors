<template>
    <div id="score">
        <table>
            <thead>
                <tr>
                    <td id="buttons">
                        <button id="menu_1" @click="swap('main-comp')" class="ui basic button font">Back to game</button>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr v-for="history in histories" :key="history.id">
                    <td class="font">
                        Id: <b>{{history.id}}</b>
                        User Score: <b>{{history.userScore}}</b>
                        Computer Score: <b>{{history.compScore}}</b>
                        Winner: <b>{{history.winner}}</b>
                        <br>Rounds:<br>
                        <p v-for="round in history.rounds" :key="round.id">
                            Round Id: <b>{{round.id}}</b>
                            User choosed: <b>{{round.user_choosed}}</b>
                            Comp choosed: <b>{{round.comp_choosed}}</b>
                        </p><br>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from 'axios'

    export default {
        prop: {
            histories: Array,
        },

        data() {
            return {
                histories: []
            }
        },

        created: function() {
            this.getHistory()
        },

        methods: {
            swap(comp) {
                this.$parent.swapComponent(comp)
            },

            async getHistory() {
                const fetchedHistory = await axios.get('http://localhost:8888/api/history')
                
                for(let i = 0; i < fetchedHistory.data.length; i++){

                    let history = new Array

                    history["id"] = fetchedHistory.data[i].id

                    let rounds = JSON.parse(fetchedHistory.data[i].rounds)

                    history["winner"] = fetchedHistory.data[i].winner
                    history["userScore"] = fetchedHistory.data[i].user_score
                    history["compScore"] = fetchedHistory.data[i].comp_score
                    history["rounds"] = rounds

                    this.histories = [...this.histories, history]
                }
            }
        }
    }
</script>

<style scoped>
    @import url('https://fonts.googleapis.com/css?family=Varela+Round');

    #score {
        max-width: 60%;
        margin: auto;
    }

    #smaller {
        text-align: top;
        width: 20%;
        height: 300px;
    }

    #buttons {
        text-align: center;
        background-color: #EFEEEE;
    }

    #menu_1 {
        margin-right: 15% !important;
        margin-left: 15% !important;
    }
    .font {
        font-family: 'Varela Round'
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #DDDDDD;
        text-align: left;
        padding: 8px;
    }
</style>