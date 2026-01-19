const PRICING = {
    readyMade: {
        tiers: [
            { min: 1, max: 5000, rate: 0.0375 },
            { min: 5001, max: 10000, rate: 0.03375 },
            { min: 10001, max: 25000, rate: 0.033 },
            { min: 25001, max: 50000, rate: 0.03 },
            { min: 50001, max: 75000, rate: 0.027375 },
            { min: 75001, max: 100000, rate: 0.02625 },
            { min: 100001, max: 500000, rate: 0.0225 },
            { min: 500001, max: Infinity, rate: 0.01875 }
        ]
    },
    customOrder: {
        tiers: [
            { min: 1, max: 5000, rate: 0.05625 },
            { min: 5001, max: 10000, rate: 0.0525 },
            { min: 10001, max: 25000, rate: 0.04875 },
            { min: 25001, max: 50000, rate: 0.045 },
            { min: 50001, max: 75000, rate: 0.04125 },
            { min: 75001, max: 100000, rate: 0.0375 }
        ]
    },
    office365: {
        tiers: [
            { min: 1, max: 5000, rate: 0.09375 },
            { min: 5001, max: 10000, rate: 0.09 },
            { min: 10001, max: 25000, rate: 0.08625 },
            { min: 25001, max: 50000, rate: 0.0825 },
            { min: 50001, max: 75000, rate: 0.07875 },
            { min: 75001, max: 100000, rate: 0.075 }
        ]
    }
};

function calculatePrice(type, totalEmail) {
    if (!type || isNaN(totalEmail)) return 0;

    const pricingType = PRICING[type];
    if (!pricingType) return 0;

    const tier = pricingType.tiers.find(t => totalEmail >= t.min && totalEmail <= t.max);
    if (!tier) return 0;

    return Math.ceil(totalEmail * tier.rate);
}
