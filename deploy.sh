mkdir $BUILD_PATH -p && \

cd $BUILD_PATH && \

pwd && \

git checkout $GIT_BRANCH && \

echo $GIT_BRANCH && \
git branch && \
git pull origin $GIT_BRANCH && \

composer update && \
npm i && \
npm run development > /dev/null
