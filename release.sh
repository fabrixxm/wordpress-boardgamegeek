#!/bin/sh

FILES=$(git ls-files)
TAG=$(git describe --tags)

cd ..
for f in $FILES; do echo "boardgamegeek/$f"; done | xargs zip boardgamegeek/boardgamegeek-$TAG.zip
cd boardgamegeek
