from django.db import models
from django.conf import settings
from django.utils.translation import ugettext_lazy as _

# Create your models here.


class Companies(models.Model):
    name = models.CharField(max_length=50)
    phone = models.CharField(max_length=50, null=True, blank=True)
    image = models.CharField(max_length=200, null=True, blank=True)
    email = models.EmailField(max_length=50, null=True, blank=True)
    address = models.TextField(null=True, blank=True)
    responsable = models.CharField(max_length=100, null=True, blank=True)
    responsible_phone = models.CharField(max_length=50, null=True, blank=True)
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'companies'

    def __str__(self):
        return self.name


class Experiences(models.Model):
    user = models.ForeignKey(
       settings.AUTH_USER_MODEL,
       on_delete=models.CASCADE,
       related_name='ex_user')
    company = models.ForeignKey(
        Companies, related_name='company_experience')
    position = models.ForeignKey('common.Positions')
    start_date = models.DateField()
    ending_date = models.DateField(blank=True, null=True)
    currently = models.BooleanField(default=False)
    # title = models.CharField(max_length=200)
    # description = models.TextField()
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'experiences'

    def __str__(self):
        return self.user.username + "/" + self.company.name+ "/" +self.position.name


class Institutes(models.Model):
    name = models.CharField(max_length=100)
    address = models.TextField()
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'institutes'

    def __str__(self):
        return self.name


class Educations(models.Model):
    name = models.CharField(max_length=100)
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'educations'

    def __str__(self):
        return self.name


class EducationsUser(models.Model):
    __types = (
       (1, _("Basic")),
       (2, _("Diversified")),
       (3, _("Academic")),
    )
    user = models.ForeignKey(
       settings.AUTH_USER_MODEL,
       on_delete=models.CASCADE,
       related_name='edu_user')
    type_educations = models.SmallIntegerField(
       default=1, choices=__types)
    institute = models.ForeignKey(Institutes)
    education = models.ForeignKey(Educations)
    start_date = models.DateField()
    ending_date = models.DateField()
    title = models.CharField(max_length=50)
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'educations_user'

    def __str__(self):
        return self.user.username + "/" + self.education.name+ "/" +self.institute.name


class Courses(models.Model):
    name = models.CharField(max_length=100)
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'courses'

    def __str__(self):
        return self.name


class CoursesUser(models.Model):
    user = models.ForeignKey(
       settings.AUTH_USER_MODEL,
       on_delete=models.CASCADE,
       related_name='c_user')
    institute = models.ForeignKey(Institutes)
    course = models.ForeignKey(Courses)
    start_date = models.DateField()
    ending_date = models.DateField()
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'courses_user'

    def __str__(self):
        return  self.user.username + "/" + self.course.name+ "/" +self.institute.name


class Skills(models.Model):
    name = models.CharField(max_length=100)
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'skills'

    def __str__(self):
        return self.name


class SkillsUser(models.Model):
    __types = (
       (1, 1),
       (2, 2),
       (3, 3),
       (4, 4),
       (5, 5),
    )
    user = models.ForeignKey(
       settings.AUTH_USER_MODEL,
       on_delete=models.CASCADE,
       related_name='s_user')
    level = models.SmallIntegerField(
       default=1, choices=__types)
    skill = models.ForeignKey(Skills)
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'skills_user'

    def __str__(self):
        return self.user.username + "/" + self.skill.name


class LanguajesUser(models.Model):
    __types = (
       (1, _("Basic")),
       (2, _("Medium")),
       (3, _("Advanced")),
    )
    user = models.ForeignKey(
       settings.AUTH_USER_MODEL,
       on_delete=models.CASCADE,
       related_name='l_user')
    level = models.SmallIntegerField(
       default=1, choices=__types)
    languaje = models.ForeignKey('common.Languajes')
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'languajes_user'

    def __str__(self):
        return self.user.username + "/" + self.languaje.name


class Classifications(models.Model):
    name = models.CharField(max_length=50)
    category = models.CharField(max_length=50)
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'classifications'

    def __str__(self):
        return self.name


class Portfolios(models.Model):
    user = models.ForeignKey(
       settings.AUTH_USER_MODEL,
       on_delete=models.CASCADE,
       related_name='p_user')
    company = models.ForeignKey(
        Companies, related_name='company_portfolio')
    classification = models.ForeignKey(
        # Classifications, related_name='classification')
        Classifications, related_name='classification_portfolio')
    name = models.CharField(max_length=50)
    description = models.TextField()
    screenshot = models.CharField(max_length=250, blank=True, null=True)
    image = models.CharField(max_length=250, blank=True, null=True)
    url = models.TextField()
    year = models.IntegerField()
    status = models.BooleanField(default=True)
    create_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        app_label = 'curriculum'
        db_table = 'portfolios'

    def __str__(self):
        return self.name+ "/" +self.company.name


class UserLanguage(models.Model):
    user = models.ForeignKey(
       settings.AUTH_USER_MODEL,
       on_delete=models.CASCADE,
       related_name='lan_user')
    language = models.ForeignKey('common.Languajes')
    about_me = models.TextField()

    class Meta:
        app_label = "curriculum"
        db_table = "user_language"

    def __str__(self):
        return self.about_me


class ExperienceLanguage(models.Model):
    language = models.ForeignKey('common.Languajes', related_name="e_lan")
    experience = models.ForeignKey(Experiences, related_name="l_exp")
    title = models.CharField(max_length=200)
    description = models.TextField()

    class Meta:
        app_label = "curriculum"
        db_table = "experience_language"

    def __str__(self):
        return self.description


class PortfolioLanguage(models.Model):
    language = models.ForeignKey('common.Languajes', related_name="p_lan")
    portfolio = models.ForeignKey(Portfolios, related_name="l_por")
    description = models.TextField()

    class Meta:
        app_label = "curriculum"
        db_table = "portfolio_language"

    def __str__(self):
        return self.description


class PortfolioSkill(models.Model):
    skill = models.ForeignKey(Skills, related_name="s_com")
    portfolio = models.ForeignKey(Portfolios, related_name="s_por")
    description = models.TextField()

    class Meta:
        app_label = "curriculum"
        db_table = "portfolio_skill"

    def __str__(self):
        return self.description


class PortfolioUser(models.Model):
    user = models.ForeignKey(
       settings.AUTH_USER_MODEL,
       on_delete=models.CASCADE,
       related_name='port_us')
    portfolio = models.ForeignKey(Portfolios, related_name="port_p")
    description_es = models.TextField()
    description_en = models.TextField()

    class Meta:
        app_label = "curriculum"
        db_table = "portfolio_user"

    def __str__(self):
        return self.user.username + " " + self.portfolio.name
