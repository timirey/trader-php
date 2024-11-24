<?php

use Timirey\Trader\TraderService;

beforeEach(function () {
    $ohlcv = include 'tests/Fixtures/ohlcv.php';

    $this->open = array_column($ohlcv, 'open');
    $this->high = array_column($ohlcv, 'high');
    $this->low = array_column($ohlcv, 'low');
    $this->close = array_column($ohlcv, 'close');
    $this->volume = array_column($ohlcv, 'volume');

    $this->trader = new TraderService();
});

it('provides correct constant values', function () {
    $constants = (new ReflectionClass($this->trader))->getConstants();

    foreach ($constants as $constant => $value) {
        expect(constant(sprintf('TRADER_%s', $constant)))
            ->toEqual($value);
    }
});

it('handles errors by throwing exception', function () {
    throw new BadFunctionCallException('Bad parameter', $this->trader::ERR_BAD_PARAM);
})->throws(BadFunctionCallException::class, 'Bad parameter');

it('executes acos method correctly', function () {
    $close = array_map('cos', $this->close);
    expect(trader_acos($close))->toEqual($this->trader->acos($close));
});

it('executes ad method correctly', function () {
    expect(trader_ad($this->high, $this->low, $this->close, $this->volume))
        ->toEqual($this->trader->ad($this->high, $this->low, $this->close, $this->volume));
});

it('executes add correctly', function () {
    expect(trader_add($this->high, $this->low))
        ->toEqual($this->trader->add($this->high, $this->low));
});

it('executes adosc correctly', function () {
    expect(trader_adosc($this->high, $this->low, $this->close, $this->volume, 3, 10))
        ->toEqual($this->trader->adosc($this->high, $this->low, $this->close, $this->volume, 3, 10));
});

it('executes adx correctly', function () {
    expect(trader_adx($this->high, $this->low, $this->close, 14))
        ->toEqual($this->trader->adx($this->high, $this->low, $this->close, 14));
});

it('executes adxr correctly', function () {
    expect(trader_adxr($this->high, $this->low, $this->close, 14))
        ->toEqual($this->trader->adxr($this->high, $this->low, $this->close, 14));
});

it('executes apo correctly', function () {
    expect(trader_apo($this->close, 12, 26, TRADER_MA_TYPE_SMA))
        ->toEqual($this->trader->apo($this->close, 12, 26, TRADER_MA_TYPE_SMA));
});

it('executes aroon correctly', function () {
    expect(trader_aroon($this->high, $this->low, 14))
        ->toEqual($this->trader->aroon($this->high, $this->low, 14));
});

it('executes aroonosc correctly', function () {
    expect(trader_aroonosc($this->high, $this->low, 14))
        ->toEqual($this->trader->aroonosc($this->high, $this->low, 14));
});

it('executes asin correctly', function () {
    expect(trader_asin(array_map('sin', $this->close)))
        ->toEqual($this->trader->asin(array_map('sin', $this->close)));
});

it('executes atan correctly', function () {
    expect(trader_atan(array_map('tan', $this->close)))
        ->toEqual($this->trader->atan(array_map('tan', $this->close)));
});

it('executes atr correctly', function () {
    expect(trader_atr($this->high, $this->low, $this->close, 14))
        ->toEqual($this->trader->atr($this->high, $this->low, $this->close, 14));
});

it('executes avgprice correctly', function () {
    expect(trader_avgprice($this->open, $this->high, $this->low, $this->close))
        ->toEqual($this->trader->avgprice($this->open, $this->high, $this->low, $this->close));
});

it('executes bbands correctly', function () {
    expect(trader_bbands($this->close, 5, 2.0, 2.0, TRADER_MA_TYPE_SMA))
        ->toEqual($this->trader->bbands($this->close, 5, 2.0, 2.0, TRADER_MA_TYPE_SMA));
});

it('executes beta correctly', function () {
    expect(trader_beta($this->open, $this->close, 5))
        ->toEqual($this->trader->beta($this->open, $this->close, 5));
});

it('executes bop correctly', function () {
    expect(trader_bop($this->open, $this->high, $this->low, $this->close))
        ->toEqual($this->trader->bop($this->open, $this->high, $this->low, $this->close));
});

it('executes cci correctly', function () {
    expect(trader_cci($this->high, $this->low, $this->close, 14))
        ->toEqual($this->trader->cci($this->high, $this->low, $this->close, 14));
});

it('executes wclprice correctly', function () {
    expect(trader_wclprice($this->high, $this->low, $this->close))
        ->toEqual($this->trader->wclprice($this->high, $this->low, $this->close));
});

it('executes willr correctly', function () {
    expect(trader_willr($this->high, $this->low, $this->close, 14))
        ->toEqual($this->trader->willr($this->high, $this->low, $this->close, 14));
});

it('executes wma correctly', function () {
    expect(trader_wma($this->close, 30))
        ->toEqual($this->trader->wma($this->close, 30));
});

it('executes ceil correctly', function () {
    expect(trader_ceil($this->close))
        ->toEqual($this->trader->ceil($this->close));
});

it('executes cmo correctly', function () {
    expect(trader_cmo($this->close, 14))
        ->toEqual($this->trader->cmo($this->close, 14));
});

it('executes correl correctly', function () {
    expect(trader_correl($this->open, $this->close, 30))
        ->toEqual($this->trader->correl($this->open, $this->close, 30));
});

it('executes cos correctly', function () {
    expect(trader_cos($this->close))
        ->toEqual($this->trader->cos($this->close));
});

it('executes cosh correctly', function () {
    expect(trader_cosh($this->close))
        ->toEqual($this->trader->cosh($this->close));
});

it('executes dema correctly', function () {
    expect(trader_dema($this->close, 30))
        ->toEqual($this->trader->dema($this->close, 30));
});

it('executes div correctly', function () {
    expect(trader_div($this->open, $this->close))
        ->toEqual($this->trader->div($this->open, $this->close));
});

it('executes dx correctly', function () {
    expect(trader_dx($this->high, $this->low, $this->close, 14))
        ->toEqual($this->trader->dx($this->high, $this->low, $this->close, 14));
});

it('executes ema correctly', function () {
    expect(trader_ema($this->close, 30))
        ->toEqual($this->trader->ema($this->close, 30));
});

it('executes errno correctly', function () {
    expect(trader_errno())
        ->toEqual($this->trader->errno());
});

it('executes exp correctly', function () {
    expect(trader_exp($this->close))
        ->toEqual($this->trader->exp($this->close));
});

it('executes floor correctly', function () {
    expect(trader_floor($this->close))
        ->toEqual($this->trader->floor($this->close));
});

it('executes get compat correctly', function () {
    expect(trader_get_compat())
        ->toEqual($this->trader->getCompat());
});

it('executes get unstable period correctly', function () {
    expect(trader_get_unstable_period(TRADER_FUNC_UNST_ADX))
        ->toEqual($this->trader->getUnstablePeriod(TRADER_FUNC_UNST_ADX));
});

it('executes ht dcperiod correctly', function () {
    expect(trader_ht_dcperiod($this->close))
        ->toEqual($this->trader->htDcperiod($this->close));
});

it('executes ht dcphase correctly', function () {
    expect(trader_ht_dcphase($this->close))
        ->toEqual($this->trader->htDcphase($this->close));
});

it('executes ht phasor correctly', function () {
    expect(trader_ht_phasor($this->close))
        ->toEqual($this->trader->htPhasor($this->close));
});

it('executes ht sine correctly', function () {
    expect(trader_ht_sine($this->close))
        ->toEqual($this->trader->htSine($this->close));
});

it('executes ht trendline correctly', function () {
    expect(trader_ht_trendline($this->close))
        ->toEqual($this->trader->htTrendline($this->close));
});

it('executes ht trendmode correctly', function () {
    expect(trader_ht_trendmode($this->close))
        ->toEqual($this->trader->htTrendmode($this->close));
});

it('executes kama correctly', function () {
    expect(trader_kama($this->close, 30))
        ->toEqual($this->trader->kama($this->close, 30));
});

it('executes linearreg angle correctly', function () {
    expect(trader_linearreg_angle($this->close, 14))
        ->toEqual($this->trader->linearregAngle($this->close, 14));
});

it('executes linearreg intercept correctly', function () {
    expect(trader_linearreg_intercept($this->close, 14))
        ->toEqual($this->trader->linearregIntercept($this->close, 14));
});

it('executes linearreg slope correctly', function () {
    expect(trader_linearreg_slope($this->close, 14))
        ->toEqual($this->trader->linearregSlope($this->close, 14));
});

it('executes linearreg correctly', function () {
    expect(trader_linearreg($this->close, 14))
        ->toEqual($this->trader->linearreg($this->close, 14));
});

it('executes ln correctly', function () {
    expect(trader_ln($this->close))
        ->toEqual($this->trader->ln($this->close));
});

it('executes log10 correctly', function () {
    expect(trader_log10($this->close))
        ->toEqual($this->trader->log10($this->close));
});

it('executes ma correctly', function () {
    expect(trader_ma($this->close, 30, TRADER_MA_TYPE_SMA))
        ->toEqual($this->trader->ma($this->close, 30, TRADER_MA_TYPE_SMA));
});

it('executes macd correctly', function () {
    expect(trader_macd($this->close, 12, 26, 9))
        ->toEqual($this->trader->macd($this->close, 12, 26, 9));
});

it('executes macdext correctly', function () {
    expect(trader_macdext($this->close, 12, TRADER_MA_TYPE_SMA, 26, TRADER_MA_TYPE_SMA, 9))
        ->toEqual($this->trader->macdext($this->close, 12, TRADER_MA_TYPE_SMA, 26, TRADER_MA_TYPE_SMA, 9));
});

it('executes macdfix correctly', function () {
    expect(trader_macdfix($this->close, 9))
        ->toEqual($this->trader->macdfix($this->close, 9));
});

it('executes mama correctly', function () {
    expect(trader_mama($this->close, 0.5, 0.05))
        ->toEqual($this->trader->mama($this->close, 0.5, 0.05));
});

it('executes mavp correctly', function () {
    expect(trader_mavp($this->close, $this->open, 2, 30, TRADER_MA_TYPE_SMA))
        ->toEqual($this->trader->mavp($this->close, $this->open, 2, 30, TRADER_MA_TYPE_SMA));
});

it('executes max correctly', function () {
    expect(trader_max($this->close, 30))
        ->toEqual($this->trader->max($this->close, 30));
});

it('executes maxindex correctly', function () {
    expect(trader_maxindex($this->close, 30))
        ->toEqual($this->trader->maxindex($this->close, 30));
});

it('executes medprice correctly', function () {
    expect(trader_medprice($this->high, $this->low))
        ->toEqual($this->trader->medprice($this->high, $this->low));
});

it('executes mfi correctly', function () {
    expect(trader_mfi($this->high, $this->low, $this->close, $this->volume, 14))
        ->toEqual($this->trader->mfi($this->high, $this->low, $this->close, $this->volume, 14));
});

it('executes midpoint correctly', function () {
    expect(trader_midpoint($this->close, 14))
        ->toEqual($this->trader->midpoint($this->close, 14));
});

it('executes midprice correctly', function () {
    expect(trader_midprice($this->high, $this->low, 14))
        ->toEqual($this->trader->midprice($this->high, $this->low, 14));
});

it('executes min correctly', function () {
    expect(trader_min($this->high, 30))
        ->toEqual($this->trader->min($this->high, 30));
});

it('executes minindex correctly', function () {
    expect(trader_minindex($this->high, 30))
        ->toEqual($this->trader->minindex($this->high, 30));
});

it('executes minmax correctly', function () {
    expect(trader_minmax($this->high, 30))
        ->toEqual($this->trader->minmax($this->high, 30));
});

it('executes minmaxindex correctly', function () {
    expect(trader_minmaxindex($this->high, 30))
        ->toEqual($this->trader->minmaxindex($this->high, 30));
});

it('executes minusDi correctly', function () {
    expect(trader_minus_di($this->high, $this->low, $this->close, 14))
        ->toEqual($this->trader->minusDi($this->high, $this->low, $this->close, 14));
});

it('executes minusDm correctly', function () {
    expect(trader_minus_dm($this->high, $this->low, 14))
        ->toEqual($this->trader->minusDm($this->high, $this->low, 14));
});

it('executes mom correctly', function () {
    expect(trader_mom($this->high, 10))
        ->toEqual($this->trader->mom($this->high, 10));
});

it('executes mult correctly', function () {
    expect(trader_mult($this->open, $this->close))
        ->toEqual($this->trader->mult($this->open, $this->close));
});

it('executes natr correctly', function () {
    expect(trader_natr($this->high, $this->low, $this->close, 14))
        ->toEqual($this->trader->natr($this->high, $this->low, $this->close, 14));
});

it('executes obv correctly', function () {
    expect(trader_obv($this->close, $this->volume))
        ->toEqual($this->trader->obv($this->close, $this->volume));
});

it('executes plusDi correctly', function () {
    expect(trader_plus_di($this->high, $this->low, $this->close, 14))
        ->toEqual($this->trader->plusDi($this->high, $this->low, $this->close, 14));
});

it('executes plusDm correctly', function () {
    expect(trader_plus_dm($this->high, $this->low, 14))
        ->toEqual($this->trader->plusDm($this->high, $this->low, 14));
});

it('executes ppo correctly', function () {
    expect(trader_ppo($this->close, 12, 26, TRADER_MA_TYPE_SMA))
        ->toEqual($this->trader->ppo($this->close, 12, 26, TRADER_MA_TYPE_SMA));
});

it('executes roc correctly', function () {
    expect(trader_roc($this->close, 10))
        ->toEqual($this->trader->roc($this->close, 10));
});

it('executes rocp correctly', function () {
    expect(trader_rocp($this->close, 10))
        ->toEqual($this->trader->rocp($this->close, 10));
});

it('executes rocr100 correctly', function () {
    expect(trader_rocr100($this->close, 10))
        ->toEqual($this->trader->rocr100($this->close, 10));
});

it('executes rocr correctly', function () {
    expect(trader_rocr($this->close, 10))
        ->toEqual($this->trader->rocr($this->close, 10));
});

it('executes rsi correctly', function () {
    expect(trader_rsi($this->close, 14))
        ->toEqual($this->trader->rsi($this->close, 14));
});

it('executes sar correctly', function () {
    expect(trader_sar($this->close, $this->low, 0.02, 0.2))
        ->toEqual($this->trader->sar($this->close, $this->low, 0.02, 0.2));
});

it('executes sarext correctly', function () {
    expect(trader_sarext($this->close, $this->low, 0.0, 0.0, 0.02, 0.02, 0.2, 0.02, 0.02, 0.2))
        ->toEqual($this->trader->sarext($this->close, $this->low, 0.0, 0.0, 0.02, 0.02, 0.2, 0.02, 0.02, 0.2));
});

it('executes setCompat correctly', function () {
    $this->trader->setCompat(TRADER_COMPATIBILITY_DEFAULT);
    expect(trader_get_compat())
        ->toEqual(TRADER_COMPATIBILITY_DEFAULT);
});

it('executes setUnstablePeriod correctly', function () {
    $this->trader->setUnstablePeriod(TRADER_FUNC_UNST_ADX, 14);
    expect(trader_get_unstable_period(TRADER_FUNC_UNST_ADX))
        ->toEqual(14);
});

it('executes sin correctly', function () {
    expect(trader_sin($this->close))
        ->toEqual($this->trader->sin($this->close));
});

it('executes sinh correctly', function () {
    expect(trader_sinh($this->close))
        ->toEqual($this->trader->sinh($this->close));
});

it('executes sma correctly', function () {
    expect(trader_sma($this->close, 30))
        ->toEqual($this->trader->sma($this->close, 30));
});

it('executes sqrt correctly', function () {
    expect(trader_sqrt($this->close))
        ->toEqual($this->trader->sqrt($this->close));
});

it('executes stddev correctly', function () {
    expect(trader_stddev($this->close, 5, 1.0))
        ->toEqual($this->trader->stddev($this->close, 5, 1.0));
});

it('executes stoch correctly', function () {
    expect(trader_stoch($this->high, $this->low, $this->close, 5, 3, TRADER_MA_TYPE_SMA, 3, TRADER_MA_TYPE_SMA))
        ->toEqual($this->trader->stoch($this->high, $this->low, $this->close, 5, 3, TRADER_MA_TYPE_SMA, 3, TRADER_MA_TYPE_SMA));
});

it('executes stochf correctly', function () {
    expect(trader_stochf($this->high, $this->low, $this->close, 5, 3, TRADER_MA_TYPE_SMA))
        ->toEqual($this->trader->stochf($this->high, $this->low, $this->close, 5, 3, TRADER_MA_TYPE_SMA));
});

it('executes stochrsi correctly', function () {
    expect(trader_stochrsi($this->close, 14, 5, 3, TRADER_MA_TYPE_SMA))
        ->toEqual($this->trader->stochrsi($this->close, 14, 5, 3, TRADER_MA_TYPE_SMA));
});

it('executes sub correctly', function () {
    expect(trader_sub($this->high, $this->low))
        ->toEqual($this->trader->sub($this->high, $this->low));
});

it('executes sum correctly', function () {
    expect(trader_sum($this->high, 30))
        ->toEqual($this->trader->sum($this->high, 30));
});

it('executes t3 correctly', function () {
    expect(trader_t3($this->high, 5, 0.7))
        ->toEqual($this->trader->t3($this->high, 5, 0.7));
});

it('executes tan correctly', function () {
    expect(trader_tan($this->close))
        ->toEqual($this->trader->tan($this->close));
});

it('executes tanh correctly', function () {
    expect(trader_tanh($this->close))
        ->toEqual($this->trader->tanh($this->close));
});

it('executes tema correctly', function () {
    expect(trader_tema($this->close, 30))
        ->toEqual($this->trader->tema($this->close, 30));
});

it('executes trange correctly', function () {
    expect(trader_trange($this->high, $this->low, $this->close))
        ->toEqual($this->trader->trange($this->high, $this->low, $this->close));
});

it('executes trima correctly', function () {
    expect(trader_trima($this->close, 30))
        ->toEqual($this->trader->trima($this->close, 30));
});

it('executes trix correctly', function () {
    expect(trader_trix($this->close, 30))
        ->toEqual($this->trader->trix($this->close, 30));
});

it('executes tsf correctly', function () {
    expect(trader_tsf($this->close, 14))
        ->toEqual($this->trader->tsf($this->close, 14));
});

it('executes typprice correctly', function () {
    expect(trader_typprice($this->high, $this->low, $this->close))
        ->toEqual($this->trader->typprice($this->high, $this->low, $this->close));
});

it('executes ultosc correctly', function () {
    expect(trader_ultosc($this->high, $this->low, $this->close, 7, 14, 28))
        ->toEqual($this->trader->ultosc($this->high, $this->low, $this->close, 7, 14, 28));
});

it('executes var correctly', function () {
    expect(trader_var($this->close, 5, 1.0))
        ->toEqual($this->trader->var($this->close, 5, 1.0));
});
