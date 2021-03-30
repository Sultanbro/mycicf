module.exports = {
    preset                   : 'ts-jest',
    testEnvironment          : 'jsdom',
    "transform"              : {
        "^.+\\.tsx?$": "ts-jest"
    },
    "transformIgnorePatterns": [
        "node_modules/(?!variables/.*)"
    ],
    "moduleNameMapper"       : {
        "\\.(css|less|sass|scss)$": "<rootDir>/resources/jsx/__mocks__/styleMock.js"
    }
};
