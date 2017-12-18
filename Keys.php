<?php
/**
 * Daniel Ziegler
 * MIT License
 *
 * Keys taken from
 * https://github.com/OrangeTux/einder/blob/master/einder/keys.py
 * many thanks!
 */

namespace nook24\Horizon;

class Keys {

    public function power() {
        return 0xE000;
    }

    public function chanUp() {
        return 0xE006;
    }

    public function chanDown() {
        return 0xE007;
    }

    public function ok() {
        return 0xE001;
    }

    public function back() {
        return 0xE002;
    }

    public function help() {
        return 0xE009;
    }

    public function mainMenu() {
        return 0xE00A;
    }

    public function menu1() { //?
        return 0xE011;
    }

    public function menu2() { //?
        return 0xE015;
    }

    public function showInfo() {
        return 0xE00E;
    }

    public function teletext() {
        return 0xE00F;
    }

    public function up() {
        return 0xE100;
    }

    public function down() {
        return 0xE101;
    }

    public function left() {
        return 0xE102;
    }

    public function right() {
        return 0xE103;
    }

    public function number0() {
        return 0xE300;
    }

    public function number1() {
        return 0xE301;
    }

    public function number2() {
        return 0xE302;
    }

    public function number3() {
        return 0xE303;
    }

    public function number4() {
        return 0xE304;
    }

    public function number5() {
        return 0xE305;
    }

    public function number6() {
        return 0xE306;
    }

    public function number7() {
        return 0xE307;
    }

    public function number8() {
        return 0xE308;
    }

    public function number9() {
        return 0xE309;
    }

    public function pause() {
        return 0xE400;
    }

    public function stop() {
        return 0xE402;
    }

    public function record() {
        return 0xE403;
    }

    public function fastFowards() {
        return 0xE405;
    }

    public function FastBackwards() {
        return 0xE407;
    }

    public function onDemand() {
        return 0xEF28;
    }

    public function dvr() { //?
        return 0xEF29;
    }

    public function tv() {
        return 0xEF2A;
    }
}
