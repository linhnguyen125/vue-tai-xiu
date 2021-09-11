<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="wrapper clearfix">
                <players
                    v-bind:scoresPlayer="scoresPlayer"
                    v-bind:activePlayer="activePlayer"
                    v-bind:currentScore="currentScore"
                    v-bind:isWinner="isWinner"
                ></players>

                <controls
                    v-on:newGame="newGame"
                    v-on:rollDice="rollDice"
                    @holdScore="holdScore"
                    v-bind:finalScore="finalScore"
                    v-bind:isPlaying="isPlaying"
                    @changeFinalScore="changeFinalScore"
                ></controls>

                <dices v-bind:dices="dices"></dices>

                <rule
                    v-bind:isOpenPopup="isOpenPopup"
                    v-on:confirm="confirm"
                ></rule>
            </div>
        </div>
    </div>
</template>

<script>
import Players from "./Players.vue";
import Controls from "./Controls.vue";
import Dices from "./Dices.vue";
import Rule from "./PopupRule.vue";

export default {
    name: "app",
    data() {
        return {
            scoresPlayer: [2, 10],
            activePlayer: 0, // nguoi choi hien tai
            currentScore: 20, // diem luot choi hien tai
            isPlaying: false, // co dang choi ?
            isOpenPopup: false,
            dices: [1, 3],
            finalScore: 10
        };
    },
    computed: {
        isWinner() {
            let { scoresPlayer, finalScore } = this;
            if (
                scoresPlayer[0] >= finalScore ||
                scoresPlayer[1] >= finalScore
            ) {
                this.isPlaying = false;
                return true;
            }
            return false;
        }
    },
    methods: {
        nextPlayer() {
            this.currentScore = 0;
            this.activePlayer = this.activePlayer === 0 ? 1 : 0;
        },
        newGame() {
            this.isOpenPopup = true;
        },
        confirm() {
            this.isOpenPopup = false;
            this.isPlaying = true;
            this.currentScore = 0;
            this.activePlayer = 0;
            this.scoresPlayer = [0, 0];
        },
        rollDice() {
            if (this.isPlaying) {
                var dice1 = Math.ceil(Math.random() * 6);
                var dice2 = Math.ceil(Math.random() * 6);
                this.dices = [dice1, dice2];
                if (dice1 == 1 || dice2 == 1) {
                    this.currentScore = 0;
                    this.nextPlayer();
                } else {
                    this.currentScore += dice1 + dice2;
                }
            } else {
                alert("Enter New Game");
            }
        },
        holdScore() {
            if (this.isPlaying) {
                let { scoresPlayer, activePlayer, currentScore } = this;
                let oldScore = scoresPlayer[activePlayer];
                // let cloneScorePlayer = [...scoresPlayer];
                // cloneScorePlayer[activePlayer] = oldScore + currentScore;
                // this.scoresPlayer = cloneScorePlayer;
                this.$set(scoresPlayer, activePlayer, oldScore + currentScore);
                if (!this.isWinner) {
                    this.nextPlayer();
                }
            } else {
                alert("Enter New Game");
            }
        },
        changeFinalScore(e) {
            var number = parseInt(e.target.value);
            if (isNaN(number)) {
                this.finalScore = "";
            } else {
                this.finalScore = number;
            }
        }
    },
    components: {
        Players,
        Controls,
        Dices,
        Rule
    }
};
</script>

<style>
/**********************************************
    *** GENERAL
    **********************************************/

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.clearfix::after {
    content: "";
    display: table;
    clear: both;
}

body {
    background-image: linear-gradient(
            rgba(62, 20, 20, 0.4),
            rgba(62, 20, 20, 0.4)
        ),
        url(/images/back.jpg);
    background-size: cover;
    background-position: center;
    font-family: Lato;
    font-weight: 300;
    position: relative;
    height: 100vh;
    color: #555;
}

.wrapper {
    width: 1000px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    box-shadow: 0px 10px 50px rgba(0, 0, 0, 0.3);
    overflow: hidden;
}
</style>
