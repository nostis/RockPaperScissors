<template>
    <div id="game">
        <table>
            <thead>
                <tr>
                    <td colspan="2" id="buttons">
                        <button id="menu_1" class="ui basic button">New game</button>
                        <button id="menu_2" class="ui basic button">Scoreboard</button>
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
                                        <p class="font">You picked Rock, computer picked Scissors, you won!</p>
                                        <p class="font">sdfasd</p>
                                        <p class="font">sdfasd</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td valign="top" id="smaller">
                        <p class="font">Actual score:</p>
                        <p class="font">Computer: 0</p>
                        <p class="font">You: 0</p>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" id="buttons">
                        <button class="ui basic button"><img id="rock" src="../assets/rock.png"></button>
                        <button class="ui basic button"><img id="paper" src="../assets/paper.png"></button>
                        <button class="ui basic button"><img id="scissors" src="../assets/scissors.png"></button>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

</template>

<script>
    export default {
        name: 'game',
        props: {
            history: Array,
        },
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