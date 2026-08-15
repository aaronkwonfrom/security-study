# Git 초기 환경 구축

## 목표
  - Git 과 GitHub 를 이용한 버전 관리 환경을 구축하고, 로컬 저장소 ( Local Repository ) 를 생성하여 프로젝트 관리

## 실습 환경
  - OS : Windows 11
  - Git : 2.55.0.windows.3
  - IDE : Visual Studio Code
  - Repository : security-study

## 수행 내용

### 1. Git 설치 및 사용자 정보 설정
```bash
git -v
git config --global user.name "GitHub 사용자명"
git config --global user.email "GitHub 가입 이메일"
```
  - git 설치 확인
  - 사용자 정보 등록

### 2. GitHub Repository 생성 및 Clone
```bash
git clone https://github.com/aaronkwonfrom/security-study.git
```
  - GitHub 원격 저장소 생성
  - 로컬 저장소 (Clone) 생성

### 3. 프로젝트 구조 구성
```
security-study
│
├── README.md
├── docs
│   ├── git
│   └── ubuntu
└── source
```
  - 실습 문서와 프로젝트 소스를 분리하여 관리

### 4. 버전 관리
``` bash
git add
git commit -m "Initialize Git environment and documentation"
git push
```
  - 변경 사항 stage
  - Commit 생성
  - GitHub 원격 저장소 업로드

## Git 작업 흐름
```
Working Tree
      │
git add
      │
Staging Area
      │
git commit
      │
Local Repository
      │
git push
      │
Remote Repository (GitHub)
```

## 결과
  - Git 개발 환경 구축 완료
  - GitHub 원격 저장소 연동 완료
  - 프로젝트 버전 관리 환경 구성 완료