module.exports = {
    preset: 'ts-jest',
    testEnvironment: 'jsdom',
    "moduleFileExtensions": ["ts", "js", "json", "vue"],
    "transform": {
        "^.+\\.js$": "<rootDir>/node_modules/babel-jest",
        ".*\\.(vue)$": "<rootDir>/node_modules/vue-jest"
    },
    "transformIgnorePatterns": [
        "node_modules/(?!variables/.*)"
    ],

};
