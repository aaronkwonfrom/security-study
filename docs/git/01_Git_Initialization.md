# Git 초기 설정 및 로컬 저장소 생성

## 학습 목표
  - Git 과 GitHub 를 이용한 버전 관리 환경을 구축하고, 로컬 저장소 ( Local Repository ) 를 생성하여 프로젝트 관리

## 1. Git 설치
  - Windows 에 Git 을 설치 후 정상적으로 설치되었는지 확인했다.

/// bash
git -v
///
  - 결과 : git version 2.55.0.windows.3
  - Git 버전이 출력되면 정상적으로 설치된 것이다.

## 2. Git 사용자 정보 설정
  - Git 은 Commit 을 생성할 때 작성자를 기록하기 때문에 최초 한 번 사용자 정보를 설정해야 함.

/// bash
git config --global user.name "GitHub 사용자명"
git config --global user.email "GitHub 가입 이메일"
///

* 확인

/// bash
git config --list
///

## 3. GitHub Repository 생성
  - GitHub 에서 'security-study' Repository를 생성했다.
    - Repository 는 프로젝트 원격 저장소 ( Remote Repository ) 역할을 함

## 4. Repository Clone
  - GitHub Repository 를 Windows PC 로 복제 ( clone ) 했다.

  /// bash
  git clone https://github.com/aaronkwonfrom/security-study.git
  ///

  * Clone 수행 시 프로젝트와 함께 '.git' 디렉터리가 생성된다.
    - '.git' 디렉터리는 commit 기록, 브랜치 정보 등 Git 의 버전 관리 정보를 저장하는 숨김 디렉터리

## 5. VS Code 에서 프로젝트 열기
  - Clone 한 'security-study' 폴더를 VS code 에서 열었다.

* 프로젝트 구성
///
security-study
│
├── README.md
└── docs
    ├── git
    └── ubuntu
///

## 6. README.md 수정
  - README.md 를 수정해 프로젝트 목적과 학습 목표를 작성하였다. 수정 후 Git 은 파일이 변경되었음을 감지해 ** M ( Modified ) ** 상태로 표시하였다.

* M ( Modified )
  - Working Tree 에서 파일이 수정되었지만 아직 Stage 되지 않은 상태를 의미함

## 7. Stage
  - VS Code Source Control 에서 '+' 버튼을 눌러 Stage 를 수행했다.
  - 이는 다음 명령과 동일하다
    - /// bash
    - git add README.md
    - ///

* Stage 는 변경된 파일을 " 다음 Commit 에 포함할 대상으로 등록하는 과정 " 이다.

// 현재까지 수행했을때 이 과정을 기록하고 있는 본 문서를 저장하려 했을때 README.md 파일을 저장했을때의 M 이 아닌 U 가 나왔다.

* Git 상태 ( State )
  - Git 은 파일의 상태를 표시하여 현재 어떤 작업이 필요한지 알려줌

  * M ( Modified )
    - 기존에 Git 이 관리하던 파일의 내용이 수정된 상태
    - ex.
    - /// README.md (M) ///

  * U ( Untracked )
    - 새로 생성되었지만 아직 Git 이 관리하지 않는 파일
    - ex.
    - /// 01_Git_Initialization.md (U) ///
            >> Untracked 파일도 'git add' 를 수행하면 Git 의 관리 대상이 된다.

// 현재 Commit 전 단계까지 완료
