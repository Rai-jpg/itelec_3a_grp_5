public class ProjectTracker {
    private static int userCount = 0;

    public static void joinProject(String userName) {
        userCount++;
        System.out.println("Welcome, " + userName + "! You are the " + userCount + "th person to join the project.");
    }

    public static int getUserCount() {
        return userCount;
    }

    public static void main(String[] args) {
        joinProject("Aquino Ricardo");
        joinProject("Eric Ramos");
        joinProject("Harold Reyes");
    
        System.out.println("Total users joined: " + getUserCount());
    }
}