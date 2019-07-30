<template>
    <div id="game">
        <table>
            <thead>
                <tr>
                    <td colspan="2" id="buttons">
                        <button class="ui basic button">New game</button>
                        <button class="ui basic button">Scores</button>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr id="high">
                    <td>
                        History
                    </td>
                    <td id="smaller">
                        Actual score
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">
                        <button>a</button>
                        <button>a</button>
                        <button>a</button>
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
    #game {
        max-width: 60%;
        margin: auto;
    }

    #bigger {
        width: 80%;
        height: 300px;
    }

    #smaller {
        width: 20%;
        height: 300px;
    }

    #buttons {
        text-align: center;
    }

    #under {
        height: 70%;
    }

    button {
        margin-right: 15% !important;
        margin-left: 15% !important;
    }

    table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    }
</style>