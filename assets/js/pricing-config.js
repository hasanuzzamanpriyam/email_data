const PRICING = {
    readyMade: {
        tiers: [
            { min: 1, max: 5000, rate: 0.01875 },
            { min: 5001, max: 10000, rate: 0.016875 },
            { min: 10001, max: 25000, rate: 0.0165 },
            { min: 25001, max: 50000, rate: 0.015 },
            { min: 50001, max: 75000, rate: 0.0136875 },
            { min: 75001, max: 100000, rate: 0.013125 },
            { min: 100001, max: 500000, rate: 0.01125 },
            { min: 500001, max: Infinity, rate: 0.009375 }
        ]
    },
    customOrder: {
        tiers: [
            { min: 1, max: 5000, rate: 0.028125 },
            { min: 5001, max: 10000, rate: 0.02625 },
            { min: 10001, max: 25000, rate: 0.024375 },
            { min: 25001, max: 50000, rate: 0.0225 },
            { min: 50001, max: 75000, rate: 0.020625 },
            { min: 75001, max: 100000, rate: 0.01875 }
        ]
    },
    office365: {
        tiers: [
            { min: 1, max: 5000, rate: 0.046875 },
            { min: 5001, max: 10000, rate: 0.045 },
            { min: 10001, max: 25000, rate: 0.043125 },
            { min: 25001, max: 50000, rate: 0.04125 },
            { min: 50001, max: 75000, rate: 0.039375 },
            { min: 75001, max: 100000, rate: 0.0375 }
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
