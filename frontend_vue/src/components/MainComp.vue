<template>
    <div id="game">
        <table>
            <thead>
                <tr>
                    <td colspan="2" id="buttons">
                        <button @click="newGame()" id="menu_1" class="ui basic button">New game</button>
                        <button @click="swap('scoreboard')" id="menu_2" class="ui basic button">Scoreboard</button>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td valign="top">
                        <table id="inner-table">
                            <tbody>
                                <tr>
                                    <td>
                                        <p v-for="round in rounds" :key="round.id">{{round}}</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td valign="top" id="smaller">
                        <p class="font">Actual score:</p>
                        <p class="font">You: {{this.userScore}}</p>
                        <p class="font">Computer: {{this.compScore}}</p>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" id="buttons">
                        <button @click="move('rock')" class="ui basic button"><img id="rock" src="../assets/rock.png"></button>
                        <button @click="move('paper')" class="ui basic button"><img id="paper" src="../assets/paper.png"></button>
                        <button @click="move('scissors')" class="ui basic button"><img id="scissors" src="../assets/scissors.png"></button>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

</template>

<script>
import axios from 'axios'

    export default {
        name: 'game',
        prop: {
            rounds: Array,
            sessionId: Number,
            userScore: Number,
            compScore: Number,
        },

        data() {
            return {
                rounds: [],
                sessionId: 0,
                userScore: 0,
                compScore: 0,
            }
        },

        methods: {
            async move(kindOfMove) {
                const response = await axios.post('http://localhost:8888/api/round', {
                    user_choosed : kindOfMove,
                    session_id : this.sessionId
                })

                this.rounds = [...this.rounds, response.data]

                this.updateScore()
            },

            newGame() {
                this.sessionId++

                this.clearGame()
                this.updateData()
            },

            async updateScore() {
                const response = await axios.get('http://localhost:8888/api/score')

                this.userScore = response.data['user_score']
                this.compScore = response.data['comp_score']
            },

            swap(comp) {
                this.newGame()
                this.$parent.swapComponent(comp)
            },

            async updateData() {
                await axios.put('http://localhost:8888/api/round', {
                    session_id: this.sessionId
                })
            },

            clearGame() {
                this.rounds = []
                this.userScore = 0
                this.compScore = 0
            }
        }

    }
</script>

<style scoped>
    @import url('https://fonts.googleapis.com/css?family=Varela+Round');

    #game {
        max-width: 60%;
        margin: auto;
    }

    #bigger {
        width: 80%;
        height: 300px;
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

    #paper {
        width: 50%;
    }

    #rock {
        width: 63.5%;
    }

    #scissors {
        width: 50%;    
    }

    #menu_1, #menu_2 {
        margin-right: 15% !important;
        margin-left: 15% !important;
    }

    #inner-table {
        width: 100%;
    }

    #inner-table td {
        border: 0px;
    }

    #inner-table p {
        background-color: #DCEFEF;
        border-radius: 5px;
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