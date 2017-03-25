#!/bin/bash

# ln -fs ~/workspace/atom/atom.symlink ~/.atom

declare -a apm=('vim-mode-plus' 'php-twig' 'symbol-gen')

brew cask install atom

for i in "${apm[@]}"
do
  :
  apm install $i
done
