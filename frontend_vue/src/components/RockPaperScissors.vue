<template>
    <div id="game">
        <table>
            <thead>
                <tr>
                    <th>New game</th>
                    <th>Scores</th>
                </tr>
            </thead>
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
</style>